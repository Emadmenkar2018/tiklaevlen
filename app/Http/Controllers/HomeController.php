<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Vanilo\Category\Models\TaxonProxy;
use Vanilo\Product\Models\ProductProxy;
use Vanilo\Properties\Models\PropertyProxy;
use Vanilo\Properties\Models\PropertyValueProxy;
use Vanilo\Category\Models\TaxonomyProxy;
class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	public function welcome(){
		$checklist_prop = PropertyProxy::where('name','checklist')->first();
        $taxonomies = TaxonomyProxy::get();
        $properties = PropertyProxy::get();
		$basili_isler = TaxonProxy::find(3)->products;
		$websites = ProductProxy::where('html','!=',0)->get();
		$notInIds = array();
		foreach ($basili_isler as $bi_key => $bi) {
			$notInIds[] = $bi->id;
		}
		foreach ($websites as $w_key => $w) {
			$notInIds[] = $w->id;
		}
		$products = ProductProxy::whereNotIn('id',$notInIds)->orderBy('id', 'DESC')->limit(5)->get();
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
		}
		return view('welcome',[
			"last_products" => $products
		]);
	}
}
