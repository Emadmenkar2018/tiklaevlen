<?php

namespace App\Http\Middleware;

use Closure;
use Menu;
use Vanilo\Category\Models\TaxonProxy;
class AdminMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$menu = Menu::get('appshell');
		/*
		$menu->addItem('about', 'About', ['url' => 'about', 'class' => 'about-item']);
		$ss = $menu->getItem('shop');
		$ss->addSubItem('about-us', 'About Us', ['url' => '/about/us']);
		*/
		$menu->removeItem('shop');
		$shop = $menu->addItem('shop', __('Ürünler'));
		$shop->addSubItem('websites', __('Web Sitesi'), ['route' => 'vanilo.website.list'])->data('icon', 'layers');
		$shop->addSubItem('paper', __('Basılı İşler'), ['route' => ['vanilo.paper.list',TaxonProxy::find(3)]])->data('icon', 'layers');
		$shop->addSubItem('otherproducts', __('Diğer Ürünler'), ['route' => ['vanilo.other.list']])->data('icon', 'layers');
		$menu->addItem('categories', __('Categorization'), ['route' => 'vanilo.taxonomy.index']);
		$menu->addItem('orders', __('Orders'), ['route' => 'vanilo.order.index']);
		$menu->addItem('product_properties', __('Product Properties'), ['route' => 'vanilo.property.index']);

		return $next($request);
    }
}
