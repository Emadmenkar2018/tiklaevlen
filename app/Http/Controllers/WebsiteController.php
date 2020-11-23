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
use Vanilo\Framework\Contracts\Requests\SyncModelTaxons;
use Vanilo\Category\Contracts\Taxonomy;

class WebsiteController extends BaseController {
    public function list(){
		return view('vanilo::website.list', [
            'products' => ProductProxy::where('html','!=',0)->paginate(100)
        ]);
    }
	public function create(){
		return view('vanilo::website.create', [
            'product' => app(Product::class),
            'states'  => ProductStateProxy::choices()
        ]);
	}
	public function show(Product $product)
    {
        return view('vanilo::website.show', [
            'product'    => $product,
			'html' => File::find($product->html),
            'taxonomies' => TaxonomyProxy::all(),
            'properties' => PropertyProxy::all()
        ]);
    }
	public function store(CreateProduct $request){
		try {
            $product = ProductProxy::create($request->except(['images','html']));
            flash()->success(__(':name adlı ürün eklendi.', ['name' => $product->name]));
            try {
                if (!empty($request->files->filter('images'))) {
                    $product->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection();
                    });
                }
				if (!empty($request->files->filter('html'))) {
                    $file_id = FileHelper::add_file($request->file('html'),'assets/files/html/')->id;
					$p = ProductProxy::find($product->id);
					$p->html = $file_id;
					$p->save();
                }
            } catch (\Exception $e) { // Here we already have the product created
                flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

                return redirect()->route('vanilo.product.edit', ['product' => $product]);
            }
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }
        return redirect(route('vanilo.website.list'));
	}
	public function edit(Product $product)
    {
        return view('vanilo::website.edit', [
            'product'    => $product,
			'html' => File::find($product->html),
            'states'     => ProductStateProxy::choices()
        ]);
    }
	public function update(Product $product, UpdateProduct $request)
    {
        try {
            $product->update($request->except(['images','html']));
			if (!empty($request->files->filter('html'))) {
				$file_id = FileHelper::add_file($request->file('html'),'assets/files/html/')->id;
				$p = ProductProxy::find($product->id);
				$p->html = $file_id;
				$p->save();
			}
            flash()->success(__(':name adlı ürün güncellendi.', ['name' => $product->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('vanilo.website.list'));
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

        return redirect(route('vanilo.website.list'));
    }


	public function syncProp(SyncModelPropertyValues $request, $for, $forId)
    {
        $model = $request->getFor();
        $model->propertyValues()->sync($request->getPropertyValueIds());

        return redirect()->back();
    }

	public function syncTax(Taxonomy $taxonomy, SyncModelTaxons $request)
    {
        $taxonIds = $request->getTaxonIds();
        $model    = $request->getFor();

        foreach (TaxonomyProxy::where('id', '<>', $taxonomy->id)->get() as $foreignTaxonomy) {
            $taxonIds = array_merge(
                $taxonIds,
                $model->taxons()->byTaxonomy($foreignTaxonomy)->get(['id'])->pluck('id')->toArray()
            );
        }

        $model->taxons()->byTaxonomy($taxonomy)->sync($taxonIds);

        return redirect()->back();
    }

}
