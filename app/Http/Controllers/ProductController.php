<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use Vanilo\Category\Contracts\Taxon;
use Vanilo\Category\Models\TaxonomyProxy;
use Vanilo\Framework\Search\ProductFinder;
use Vanilo\Product\Contracts\Product;
use Vanilo\Properties\Models\PropertyProxy;
use Vanilo\Properties\Models\PropertyValueProxy;
use App\Registry;
use Vanilo\Category\Models\TaxonProxy;
use App\File;
use App\Helpers\CategoryHelper;
class ProductController extends Controller
{
    /** @var ProductFinder */
    private $productFinder;

    public function __construct(ProductFinder $productFinder)
    {
        $this->productFinder = $productFinder;
    }

    public function index(ProductIndexRequest $request, string $taxonomyName = null, Taxon $taxon = null)
    {
		/*CategoryHelper::get();
		exit;*/
		$checklist_prop = PropertyProxy::where('name','checklist')->first();
        $taxonomies = TaxonomyProxy::get();
        $properties = PropertyProxy::get();


        if ($taxon) {
            $this->productFinder->withinTaxon($taxon);
        }else{
			$this->productFinder->withinTaxon(TaxonProxy::find(4));
		}

        foreach ($request->filters($properties) as $property => $values) {
            $this->productFinder->havingPropertyValuesByName($property, $values);
        }

		$products = $this->productFinder->paginate(10);
		foreach ($products as $akey => $product) {
			$props = $product->propertyValues->toArray();
			$ckey = array_search($checklist_prop->id, array_column($props, 'property_id'));

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
			if($props[$ckey]["value"] == "true"){
				$products[$akey]->registryView = true;
			}else{
				$products[$akey]->registryView = false;
			}

			$checkRegistry = Registry::where('product',$product->id)->first();
			if($checkRegistry){
				$products[$akey]->registry = $checkRegistry;
			}else{
				$products[$akey]->registry = $checkRegistry;
			}
		}
		if($taxon){
			if($taxon->id == 2){
				return view('product.website', [
		            'products'   => $products,
		            'taxonomies' => $taxonomies,
		            'taxon'      => $taxon,
		            'properties' => $properties,
		            'filters'    => $request->filters($properties),

		        ]);
			}
			else if($taxon->id == 3){
				return view('product.davetiye', [
		            'products'   => $products,
		            'taxonomies' => $taxonomies,
		            'taxon'      => $taxon,
		            'properties' => $properties,
		            'filters'    => $request->filters($properties),

		        ]);
			}
			else{

				return view('product.index', [
					'products'   => $products,
					'taxonomies' => $taxonomies,
					'taxon'      => $taxon,
					'properties' => $properties,
					'filters'    => $request->filters($properties),

				]);
			}
		}else{
			return view('product.index', [
				'products'   => $products,
				'taxonomies' => $taxonomies,
				'taxon'      => $taxon,
				'properties' => $properties,
				'filters'    => $request->filters($properties),

			]);
		}

    }

    public function show(Product $product,$color="none")
    {
		$color_property = PropertyProxy::where('name','color')->first();
		$color_property_values = PropertyValueProxy::where('property_id',$color_property->id)->get();
		$s_ps = $product->propertyValues->toArray();
		$ckey = array_search($color_property->id, array_column($s_ps, 'property_id'));
		$imgs = $product->getMedia()->toArray();
		$p_imgs = array();
		$p_cs = array();
		foreach ($product->getMedia() as $key => $value) {
			$i_color = explode('!',explode(".",explode("_",$value->file_name)[1])[0])[0];

			$p_imgs[$i_color][] = $value;
			$p_cs[] = $i_color;

		}
		if(strrpos($color,"!")){
			$color = $s_ps[$ckey]["value"];
			$gift = true;
		}else{
			$gift = false;
			if($color == "none"){
				$color = $s_ps[$ckey]["value"];
			}
		}

		$product->color = !empty($product->propertyValues->toArray()) ? ($color):("");
        return view('product.show', [
			'product' => $product,
			'gift' => $gift,
			'color_property_values' => array_unique($p_cs),
			'selected_color' => !empty($product->propertyValues->toArray()) ? ($color):(""),
			"product_images" => $p_imgs
		]);
    }


	public function website_show(Product $product,$color="none")
    {
		$color_property = PropertyProxy::where('name','color')->first();
		$color_property_values = PropertyValueProxy::where('property_id',$color_property->id)->get();
		$s_ps = $product->propertyValues->toArray();
		$template_property = PropertyProxy::where('name','template_name')->first();
		$template_property_values = PropertyValueProxy::where('property_id',$template_property->id)->get();
		$tkey = array_search($template_property->id, array_column($s_ps, 'property_id'));

		$ckey = array_search($color_property->id, array_column($s_ps, 'property_id'));
		$imgs = $product->getMedia()->toArray();
		$p_imgs = array();
		$p_cs = array();
		foreach ($product->getMedia() as $key => $value) {
			$i_color = explode('!',explode(".",explode("_",$value->file_name)[1])[0])[0];

			$p_imgs[$i_color][] = $value;
			$p_cs[] = $i_color;

		}

		if($color == "none"){
			$color = $s_ps[$ckey]["value"];
		}
		$product->color = !empty($product->propertyValues->toArray()) ? ($color):("");
        return view('product.website-show', [
			'product' => $product,
			'color_property_values' => array_unique($p_cs),
			'selected_color' => !empty($product->propertyValues->toArray()) ? ($color):(""),
			"product_images" => $p_imgs,
			"html_file" => File::find($product->html),
			"demo" => $s_ps[$tkey]["title"]
		]);
    }

	public function davetiye_show(Product $product,$color="none")
    {
		$color_property = PropertyProxy::where('name','color')->first();
		$color_property_values = PropertyValueProxy::where('property_id',$color_property->id)->get();
		$s_ps = $product->propertyValues->toArray();
		$ckey = array_search($color_property->id, array_column($s_ps, 'property_id'));
		$imgs = $product->getMedia()->toArray();
		$p_imgs = array();
		$p_cs = array();
		foreach ($product->getMedia() as $key => $value) {
			$i_color = explode('!',explode(".",explode("_",$value->file_name)[1])[0])[0];

			$p_imgs[$i_color][] = $value;
			$p_cs[] = $i_color;

		}

		if($color == "none"){
			$color = $s_ps[$ckey]["value"];

		}
        return view('product.davetiye-show', [
			'product' => $product,
			'color_property_values' => array_unique($p_cs),
			'selected_color' => !empty($product->propertyValues->toArray()) ? ($color):(""),
			"product_images" => $p_imgs,
		]);
    }
}
