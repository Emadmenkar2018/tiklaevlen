<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ProductIndexRequest;
use Vanilo\Category\Contracts\Taxon;
use Vanilo\Category\Models\TaxonomyProxy;
use App\ProductFinder2;
use Vanilo\Product\Contracts\Product;
use Vanilo\Properties\Models\PropertyProxy;
use Vanilo\Properties\Models\PropertyValueProxy;
use Illuminate\Http\Request;
use App\Registry;
use Vanilo\Product\Models\ProductProxy;

class RegistryController extends \App\Http\Controllers\Controller
{
    /** @var ProductFinder2 */
    private $productFinder;
    public function __construct(ProductFinder2 $productFinder)
    {
        $this->productFinder = $productFinder;
    }
    public function index(ProductIndexRequest $request)
    {
		$properties = PropertyProxy::get();
		$registry_items = Registry::where('user',$request->user()->id)->get();
		$product_ids = array();
		foreach ($registry_items as $ri_key => $ri) {
			$product_ids[] = $ri->product;
		}
		$this->productFinder->getIds($product_ids);
		foreach ($request->filters($properties) as $property => $values) {
            $this->productFinder->havingPropertyValuesByName($property, $values);
        }
		$products = $this->productFinder->getResults();
		foreach ($products as $akey => $product) {
			$props = $product->propertyValues->toArray();
			$color_property = PropertyProxy::where('name','color')->first();
			$color_key = array_search($color_property->id, array_column($props, 'property_id'));
			if(!empty($props[$color_key])){
				$imgs = $product->getMedia()->toArray();
				$p_imgs = array();
				$p_cs = array();
				foreach ($product->getMedia() as $key => $value) {
					$i_color = explode('!',explode(".",explode("_",$value->file_name)[1])[0])[0];
					$p_imgs[$i_color][] = $value;
					$p_cs[] = $i_color;
				}
				$products[$akey]->colors =array_unique($p_cs);
				$products[$akey]->product_images = $p_imgs;
				$products[$akey]->active_color = $props[$color_key]["value"];
			}
			$checkRegistry = Registry::where('product',$product->id)->first();
			if($checkRegistry){
				$products[$akey]->registry = $checkRegistry;
			}else{
				$products[$akey]->registry = $checkRegistry;
			}
		}
		return view('registry.index', [
			"properties" => $properties,
			"products" => $products,
			'filters'    => $request->filters($properties),
			"taxon" => null
        ]);
    }
	public function add_registry_item(Request $request){
		$registry = Registry::create([
			"user" => $request->user()->id,
			"product" => $request->product,
			"quantity" => $request->quantity,
			"property" => $request->property
		]);
		return ["Success" =>true,"registry_id" => $registry->id];
	}
	public function remove_registry_item(Request $request){
		$registry = Registry::find($request->id);
		$registry->delete();
		return ["Success" => true];
	}

	public function update_registry_quantity(Request $request){
		$registry = Registry::find($request->id);
		$registry->quantity = $request->quantity;
		$registry->save();
		return ["Success" => true];
	}
	public function update_registry_property(Request $request){
		$registry = Registry::find($request->id);
		$registry->property = $request->property;
		$registry->save();
		return ["Success" => true];
	}
}
