<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(env('APP_ENV') == 'production')
    \URL::forcescheme('https');

Route::get('/admin/web/list', 'WebsiteController@list')->name("vanilo.website.list");
Route::get('/admin/web/create', 'WebsiteController@create')->name("vanilo.website.create");
Route::post('/admin/web/store', 'WebsiteController@store')->name("vanilo.website.store");
Route::get('admin/web/{product}', 'WebsiteController@show')->name("vanilo.website.show");
Route::get('admin/web/{product}/edit', 'WebsiteController@edit')->name("vanilo.website.edit");
Route::put('admin/web/{product}', 'WebsiteController@update')->name("vanilo.website.update");
Route::delete('admin/web/{product}', 'WebsiteController@destroy')->name("vanilo.website.destroy");
Route::put('/web/property/sync/{for}/{forId}', 'WebsiteController@syncProp')->name('vanilo.web_property_value.sync');

Route::put('/web/taxonomy/{taxonomy}/sync', 'WebsiteController@syncTax')->name('vanilo.taxonomy.syncTax');


Route::get('/admin/paper/list/{taxon}', 'PaperController@list')->name("vanilo.paper.list");
Route::get('/admin/paper/create', 'PaperController@create')->name("vanilo.paper.create");
Route::post('/admin/paper/store', 'PaperController@store')->name("vanilo.paper.store");
Route::get('admin/paper/{product}', 'PaperController@show')->name("vanilo.paper.show");
Route::delete('admin/paper/{product}', 'PaperController@destroy')->name("vanilo.paper.destroy");
Route::get('admin/paper/{product}/edit', 'PaperController@edit')->name("vanilo.paper.edit");
Route::put('admin/paper/{product}', 'PaperController@update')->name("vanilo.paper.update");

Route::delete('admin/media/{medium}', 'MediaController@destroy')->name("vanilo.p_media.destroy");

Route::get('/admin/otherproducts/list', 'OtherProductController@list')->name("vanilo.other.list");
Route::get('/admin/otherproducts/create', 'OtherProductController@create')->name("vanilo.other.create");
Route::post('/admin/otherproducts/store', 'OtherProductController@store')->name("vanilo.other.store");
Route::get('admin/otherproducts/{product}', 'OtherProductController@show')->name("vanilo.other.show");
Route::get('admin/otherproducts/{product}/edit', 'OtherProductController@edit')->name("vanilo.other.edit");
Route::put('admin/otherproducts/{product}', 'OtherProductController@update')->name("vanilo.other.update");
Route::delete('admin/otherproducts/{product}', 'OtherProductController@destroy')->name("vanilo.other.destroy");

Route::get('/', 'HomeController@welcome')->name('welcome');
// Route::get('/offline', 'HomeController@welcome')->name('welcome');

Route::get('/website', function () {
    return view('website');
})->name('website');
Route::get('/davetiye', function () {
    return view('davetiye');
})->name('davetiye');
Auth::routes();
Route::post('/register2', 'Auth\Register2Controller@create')->name('register2');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'shop', 'as' => 'product.'], function() {
    Route::get('products', 'ProductController@index')->name('index');
    Route::get('c/{taxonomyName}/{taxon}', 'ProductController@index')->name('category');
    Route::get('urunler/{product}/{color?}', 'ProductController@show')->name('show');
	Route::get('website/{product}/{color?}', 'ProductController@website_show')->name('website_show');
	Route::get('basili-urunler/{product}/{color?}', 'ProductController@davetiye_show')->name('davetiye_show');

});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('show', 'CartController@show')->name('show');
    Route::post('add/{id}/{color}', 'CartController@add')->name('add');
    Route::post('update/{cart_item}', 'CartController@update')->name('update');
    Route::post('remove/{cart_item}', 'CartController@remove')->name('remove');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function() {
    Route::get('show', 'CheckoutController@show')->name('show');
    Route::post('submit', 'CheckoutController@submit')->name('submit');
});

Route::get('/manage/registry', 'Frontend\RegistryController@index')->name('registry');
Route::post('/add_registry_item', 'Frontend\RegistryController@add_registry_item')->name('add_registry_item');
Route::post('/remove_registry_item', 'Frontend\RegistryController@remove_registry_item')->name('remove_registry_item');
Route::post('/updata_registry_quantity', 'Frontend\RegistryController@update_registry_quantity')->name('update_registry_quantity');
Route::post('/update_registry_property', 'Frontend\RegistryController@update_registry_property')->name('update_registry_property');

Route::get('/manage', 'Frontend\ManageController@index')->name('manage_index');
Route::get('/manage/website', 'Frontend\ManageController@website_index')->name('website_manage');
Route::post('/update_website_active_modules', 'Frontend\ManageController@update_website_active_modules')->name('website_update_website_active_modules');
Route::get('/manage/website/home/', 'Frontend\ManageController@website_home_update')->name('website_home_update');
Route::get('/manage/website/registry/', 'Frontend\ManageController@website_registry_update')->name('website_registry_update');
Route::post('/manage/website/home/', 'Frontend\ManageController@website_home_update')->name('website_home_update_post');
Route::post('/ilceler', 'Frontend\ManageController@ilceler')->name('ilceler');
Route::post('/add-story', 'Frontend\ManageController@add_story')->name('website_home_add_story');
Route::post('/update-story', 'Frontend\ManageController@update_story')->name('website_home_update_story');
Route::post('/delete-story', 'Frontend\ManageController@delete_story')->name('website_home_delete_story');


Route::get('/manage/website/schedule/', 'Frontend\ManageController@website_schedule_update')->name('website_schedule_update');
Route::post('/manage/website/schedule/', 'Frontend\ManageController@website_schedule_update')->name('website_schedule_update_post');

Route::get('/website/{slug}/{module}', 'Frontend\ManageController@preview_website')->name('preview_website');
Route::post('/add_schedule_event', 'Frontend\ManageController@add_schedule_event')->name('add_schedule_event');
Route::post('/update_schedule_event', 'Frontend\ManageController@update_schedule_event')->name('update_schedule_event');
Route::post('/delete_schedule_event', 'Frontend\ManageController@delete_schedule_event')->name('delete_schedule_event');

Route::get('/manage/website/photos/', 'Frontend\ManageController@website_photos_update')->name('website_photos_update');
Route::post('/manage/website/photos/', 'Frontend\ManageController@website_photos_update')->name('website_photos_update_post');

Route::post('/setGuest', 'Frontend\ManageController@setGuest')->name('setGuest');

Route::post('/delete_website_photo', 'Frontend\ManageController@delete_website_photo')->name('delete_website_photo');


Route::get('/manage/guests', 'Frontend\GuestController@index')->name('guests');
Route::get('/deleteGuest/{id}', 'Frontend\ManageController@delete')->name('delete_guest');

Route::post('/manage/setWebsite', 'Frontend\ManageController@setWebsite')->name('setWebsite');
Route::get('/iade-ve-iptal-kosullari',function(){
	return view('iade-iptal');
});

Route::get('/kisisel-verilerin-korunmasi-aydinlatma-metni',function(){
	return view('kisisel-veri');
});
Route::get('/kullanim-sartlari',function(){
	return view('kullanim-sartlari');
});
Route::get('/veri-isleme',function(){
	return view('veri-isleme');
});
Route::get('/mesafeli-satis-sozlesmesi',function(){
	return view('mesafeli-satis');
});
Route::get('/on-bilgilendirme-formu',function(){
	return view('on-bilgilendirme');
});
Route::get('/gizlilik-politikasi',function(){
	return view('gizlilik-politikasi');
});

Route::get('/hakkimizda',function(){
	return view('hakkimizda');
});
Route::get('/sss',function(){
	return view('sss');
});
Route::get('/nedir',function(){
	return view('nedir');
});
Route::get('/nasil-calisir',function(){
	return view('nasil-calisir');
});
