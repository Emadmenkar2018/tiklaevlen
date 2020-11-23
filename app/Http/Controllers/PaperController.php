<?php

namespace App\Http\Controllers;
use Konekt\AppShell\Http\Controllers\BaseController;
use Vanilo\Product\Contracts\Product;
use Vanilo\Product\Models\ProductProxy;
use Vanilo\Product\Models\ProductStateProxy;
use Vanilo\Framework\Contracts\Requests\CreateProduct;
use App\Helpers\FileHelper;
use App\File;
use Vanilo\Category\Models\TaxonomyProxy;
use Vanilo\Properties\Models\PropertyProxy;
use Vanilo\Framework\Contracts\Requests\SyncModelPropertyValues;
use Vanilo\Framework\Contracts\Requests\UpdateProduct;
use Vanilo\Category\Models\TaxonProxy;
use Vanilo\Framework\Search\ProductFinder;
use Vanilo\Category\Contracts\Taxon;

class PaperController extends BaseController {
	private $productFinder;

	public function __construct(ProductFinder $productFinder)
    {
        $this->productFinder = $productFinder;
    }

    public function list(Taxon $taxon = null){


		if ($taxon) {
            $this->productFinder->withinTaxon($taxon);
        }

		return view('vanilo::paper.list', [
            'products' => $this->productFinder->paginate()
        ]);
    }

	public function create(){
		return view('vanilo::paper.create', [
            'product' => app(Product::class),
            'states'  => ProductStateProxy::choices()
        ]);
	}
	public function show(Product $product)
    {
        return view('vanilo::paper.show', [
            'product'    => $product,
            'taxonomies' => TaxonomyProxy::all(),
            'properties' => PropertyProxy::all()
        ]);
    }
	public function store(CreateProduct $request){
		try {
            $product = ProductProxy::create($request->except(['images']));
			$taxon = TaxonProxy::find(3);
			$product->addTaxon($taxon);
            flash()->success(__(':name adlı ürün eklendi.', ['name' => $product->name]));
            try {
                if (!empty($request->files->filter('images'))) {
                    $product->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection();
                    });
                }
            } catch (\Exception $e) { // Here we already have the product created
                flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

                return redirect()->route('vanilo.product.edit', ['product' => $product]);
            }
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }
        return redirect(route('vanilo.paper.list',3));
	}

	public function destroy(Product $product)
	{
		try {
			$name = $product->name;
			$product->delete();

			flash()->warning(__(':name adlı ürün silindi.', ['name' => $name]));
		} catch (\Exception $e) {
			flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

			return redirect()->back();
		}

		return redirect(route('vanilo.paper.list',3));
	}

	public function edit(Product $product)
    {
        return view('vanilo::paper.edit', [
            'product'    => $product,
            'states'     => ProductStateProxy::choices()
        ]);
    }

	public function update(Product $product, UpdateProduct $request)
    {
        try {
            $product->update($request->except(['images']));
            flash()->success(__(':name adlı ürün güncellendi.', ['name' => $product->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('vanilo.paper.list',3));
    }
}
