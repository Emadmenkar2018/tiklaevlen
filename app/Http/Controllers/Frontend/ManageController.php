<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Vanilo\Order\Models\OrderProxy;
use Vanilo\Product\Models\ProductProxy;
use Vanilo\Properties\Models\PropertyProxy;
use App\File;
use App\Website;
use App\Il;
use App\Ilce;
use App\ModuleData;
use App\WebsiteStory;
use App\Helpers\FileHelper;
use App\Schedule;
use App\Registry;
use App\ProductFinder2;
use App\WebsitePhotos;
use App\Guest;
use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\ProductIndexRequest;
class ManageController extends \App\Http\Controllers\Controller
{
	private $productFinder;
    public function __construct(ProductFinder2 $productFinder)
    {
        $this->productFinder = $productFinder;
    }

	public function index(Request $request)
    {
		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();

		return view('manage.index', [
			"website" => $website
        ]);
    }
	public function website_index(Request $request){
		if($request->user()->website != 0){
			$product = ProductProxy::find($request->user()->website);
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();

			$website->html_file = File::find($product->html);
			return view('manage.website.index',[
				"website" => $website
			]);
		}else{
			return redirect('/shop/c/urunler/2');
		}

	}
	public function ilceler(Request $request){
		return Ilce::where('il_no',$request->id)->get();
	}
	public function update_website_active_modules(Request $request){
		$website = Website::find($request->website);
		$active_modules = $website->active_modules;
		$active_modules[$request->module] = $request->value === 'true'? true: false;
		$website->active_modules = $active_modules;
		$website->save();
		return ["Success" => true,"website" => $website];
	}

	public function add_story(Request $request){
		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
		$story = WebsiteStory::create([
			"title" => $request->title,
			"tag_date" => $request->tag_date,
			"description" => $request->description,
			"website" => $website->id
		]);
		return ["Success" => true,"story" => $story];
	}

	public function update_story(Request $request){
		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
		$story = WebsiteStory::find($request->id);
		$story->title = $request->title;
		$story->tag_date = $request->tag_date;
		$story->description = $request->description;

		$story->save();

		return ["Success" => true,"stories" => WebsiteStory::where('website',$website->id)->get()];
	}

	public function delete_story(Request $request){
		$story = WebsiteStory::find($request->id);
		$story->delete();
		return ["Success" => true];
	}

	public function website_home_update(Request $request){
		if($request->isMethod('post'))
		{
			$module_data_request = json_decode($request->data);

			if($request->wedding_summary_main_image){
				$module_data_request->main_image = FileHelper::add_file($request->wedding_summary_main_image,'assets/files/websiteimages/')->id;
			}else{
				$module_data_request->main_image = 0;
			}
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();

			$module_data = ModuleData::where('website',$website->id)->where('module','home')->first();

			if($module_data["main_image"] != 0){
				$module_data["main_image_file"] = File::find($module_data["main_image"]);
			}

			$module_data->data =  $module_data_request;
			$module_data->save();
			return ["Success" => true];
		}
		else{
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
			$module_data = ModuleData::where('website',$website->id)->where('module','home')->first()->data;

			if($module_data["main_image"] != 0){

				$module_data["main_image_file"] = File::find($module_data["main_image"]);
			}
			return view('manage.website.website_home',[
				"iller" => Il::all(),
				"website" => $website,
				"stories" => WebsiteStory::where('website',$website->id)->get(),
				"module" => $module_data,
				"ilceler" => $module_data["il"] != null ? ( Ilce::where('il_no',$module_data["il"])->get()):(null)
			]);
		}
	}

	public function website_registry_update(ProductIndexRequest $request){
		if($request->isMethod('post'))
		{

		}
		else{
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
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
			return view('manage.website.website_registry',[
				"website" => $website,
				"properties" => $properties,
				"products" => $products,
			]);
		}
	}


	public function preview_website($slug,$type,Request $request){
		$website = Website::find($slug);

		$product = ProductProxy::find($website->product);
		$website->html_file = File::find($product->html);
		$modules = array();
		$template_property = PropertyProxy::where('name','template_name')->first();
		$props = $product->propertyValues->toArray();
		$template_color_key = array_search($template_property->id, array_column($props, 'property_id'));
		foreach ($website["active_modules"] as $m_key => $module) {
			if($module == true){
				if($m_key == "home"){
					$m = ModuleData::where('website',$website->id)->where('module',$m_key)->first()->data;
					if($m["il"] > 0){
						$m["il"] = Il::where('il_no',$m["il"])->first();
					}
					if($m["ilce"] > 0){
						$m["ilce"] = Ilce::where('ilce_no',$m["ilce"])->first();
					}
					if($m["main_image"] != 0){
						$m["main_image_file"] = File::find($m["main_image"]);
					}
					$m['stories'] = WebsiteStory::where('website',$website->id)->get();
					$modules[$m_key] = $m;
				}
				if($m_key == 'schedule'){
					$m = ModuleData::where('website',$website->id)->where('module',$m_key)->first()->data;
					$m["schedules"] = Schedule::where('website',$website->id)->get();
					$modules[$m_key] = $m;
				}
				if($m_key == 'registry'){

					$registry_items = Registry::where('user',$website->user)->get();

					$product_ids = array();
					foreach ($registry_items as $ri_key => $ri) {
						$product_ids[] = $ri->product;
					}
					$this->productFinder->getIds($product_ids);
					$products = $this->productFinder->getResults();
					foreach ($products as $k => $product) {
						$imgs = $product->getMedia()->toArray()[0];
						$products[$k]->imgs = $imgs;
					}
					$modules[$m_key] = $products;
				}
				if($m_key == 'photos'){
					$photos = array();
					foreach (WebsitePhotos::where('website',$website->id)->get() as $key => $wp) {
						$photos[] = File::find($wp->photo);
					}
					$modules[$m_key] = $photos;
				}
			}
		}

		$website->modules = $modules;
		$website->active_module = $type;
		$website->base_url = '/website/'.$website->slug."/";
		$website->template_name = $props[$template_color_key]["value"];
		return view('manage.website.preview',[
			"website" => $website
		]);
	}

	public function website_schedule_update(Request $request){
		if($request->isMethod('post')){
			$module_data_request = $request->all();
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
			$module_data = ModuleData::where('website',$website->id)->where('module','schedule')->first();
			$module_data->data =  $module_data_request;
			$module_data->save();
			return ["Success" => true];
		}
		else{
			$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
			$module_data = ModuleData::where('website',$website->id)->where('module','schedule')->first()->data;
			return view('manage.website.website_schedule',[
				"module" => $module_data,
				"website" => $website,
				"iller" => Il::all(),
				"schedules" => Schedule::where('website',$website->id)->get()
			]);
		}
	}
	public function add_schedule_event(Request $request){

		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
		$event_location = json_decode($request->event_location);

		$schedule = Schedule::create([
			"website" => $website->id,
			"event_type" => $request->event_type,
			"event_name" => $request->event_name,
			"date" => $request->event_date,
			"start_time" => $request->event_start_time,
			"end_time" => $request->event_end_time,
			"event_location" => $event_location,
			"description" => $request->event_description
		]);

		return ["Success" => true,"schedules" => Schedule::where('website',$website->id)->get()];
	}

	public function update_schedule_event(Request $request){
		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();
		$event_location = json_decode($request->event_location);

		$schedule = Schedule::find($request->schedule_id);

		$schedule->event_type = $request->event_type;
		$schedule->event_name = $request->event_name;
		$schedule->date = $request->event_date;
		$schedule->start_time = $request->event_start_time;
		$schedule->end_time = $request->event_end_time;
		$schedule->event_location = $request->event_location;
		$schedule->description = $request->event_description;

		$schedule->save();

		return ["Success" => true,"schedules" => Schedule::where('website',$website->id)->get()];
	}
	public function delete_schedule_event(Request $request){
		$schedule = Schedule::find($request->schedule_id);
		$schedule->delete();
		return ["Success" => true];
	}
	public function website_photos_update(Request $request){
		$website = Website::where('product',$request->user()->website)->where('user',$request->user()->id)->first();

		if($request->isMethod('post')){
			$ids = array();
			$f_imgs = array();
			foreach ($request->photos as $key => $value) {
				$file =  FileHelper::add_file($value,'assets/files/websiteimages/');
				$f_imgs[] = $file;
				WebsitePhotos::create([
					"photo" => $file->id,
					"website" => $website->id
				]);
			}
			$photos = array();
			foreach (WebsitePhotos::where('website',$website->id)->get() as $key => $wp) {
				$photos[] = File::find($wp->photo);
			}
			return ["Success" => true, "photos" => $photos];
		}else{
			$photos = array();
			foreach (WebsitePhotos::where('website',$website->id)->get() as $key => $wp) {
				$photos[] = File::find($wp->photo);
			}
			return view('manage.website.website_photos',[
				"website" => $website,
				"photos" => $photos
			]);
		}
	}
	public function setGuest(Request $request){
		$guest = Guest::create([
			"name" => $request->name,
			"email" => $request->email,
			"messages" => $request->message,
			"guests" => $request->guests,
			"user_id" => $request->user
		]);
		return ["Success" => true,"guest" => $guest];
	}
	public function delete($id){
		$guest = Guest::find($id);
		$guest->delete();
		return redirect()->back();
	}
	public function delete_website_photo(Request $request){
		$wp = WebsitePhotos::where('photo',$request->id)->first();
		$wp->delete();

		return ["Success" => true];
	}
	public function setWebsite(Request $request){
		$user = User::find($request->user()->id);
		$user->website = $request->id;
		$user->save();

		$website = Website::create([
			"user" => $request->user()->id,
			"product" => $request->id,
			"slug" => Str::slug($request->user()->name . " ". $request->user()->id,"-"),
			"status" => "nonvisible",
			"active_modules" => [
				"home" => true,
				"schedule" => true,
				"registry" => true,
				"photos" => true,
				"sss" => true
			]
		]);

		ModuleData::create([
			"website" => $website->id,
			"module" => "home",
			"data" => [
				"il" => 0,
				"date" => 0,
				"ilce" => "",
				"title" => "",
				"address" => "",
				"hashtag" => "",
				"page_title" => "",
				"page_message" => "",
				"main_image" => 0,
				"bottom_image" => 0
			]
		]);
		ModuleData::create([
			"website" => $website->id,
			"module" => "schedule",
			"data" => [
				"title" => "",
				"description" => "",
			]
		]);

		return redirect('/manage/website');
	}
}
