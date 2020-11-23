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

class OtherProductController extends BaseController {
	private $productFinder;

	public function __construct(ProductFinder $productFinder)
    {
        $this->productFinder = $productFinder;
    }

    public function list(Taxon $taxon = null){

		$basili_isler = TaxonProxy::find(3)->products;
		$websites = ProductProxy::where('html','!=',0)->get();
		$notInIds = array();
		foreach ($basili_isler as $bi_key => $bi) {
			$notInIds[] = $bi->id;
		}
		foreach ($websites as $w_key => $w) {
			$notInIds[] = $w->id;
		}

		return view('vanilo::other.list', [
            'products' => ProductProxy::whereNotIn('id',$notInIds)->paginate()
        ]);
    }

	public function create(){
		return view('vanilo::other.create', [
            'product' => app(Product::class),
            'states'  => ProductStateProxy::choices()
        ]);
	}
	public function show(Product $product)
    {
        return view('vanilo::other.show', [
            'product'    => $product,
            'taxonomies' => TaxonomyProxy::all(),
            'properties' => PropertyProxy::all()
        ]);
    }
	public function store(CreateProduct $request){
		try {
            $product = ProductProxy::create($request->except(['images']));
            flash()->success(__(':name adlı ürün eklendi.', ['name' => $product->name]));
            try {
                if (!empty($request->files->filter('images'))) {
                    $product->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection();
                    });
                }
            } catch (\Exception $e) { // Here we already have the product created
                flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

                return redirect()->route('vanilo.other.edit', ['product' => $product]);
            }
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }
        return redirect(route('vanilo.other.list'));
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

		return redirect(route('vanilo.other.list'));
	}

	public function edit(Product $product)
    {
        return view('vanilo::other.edit', [
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

        return redirect(route('vanilo.other.list'));
    }
}
