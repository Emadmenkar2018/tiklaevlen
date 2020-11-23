<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Cart\Contracts\CartItem;
use Vanilo\Cart\Facades\Cart;
use Vanilo\Product\Contracts\Product;
use Vanilo\Product\Models\ProductProxy;
class CartController extends Controller
{
    public function add($id,$color)
    {
		$product = ProductProxy::find($id);
		$cart_item = Cart::addItem($product);
		$cart_item->color=$color;
		$cart_item->save();
        flash()->success($product->name . ' sepete eklendi.');

        return redirect()->route('cart.show');
    }

    public function remove(CartItem $cart_item)
    {
        Cart::removeItem($cart_item);
        flash()->info($cart_item->getBuyable()->getName() . ' has been removed from cart');

        return redirect()->route('cart.show');
    }

    public function update(CartItem $cart_item, Request $request)
    {
        $qty = (int) $request->get('qty', $cart_item->getQuantity());
        $cart_item->quantity = $qty;
        $cart_item->save();

        flash()->info($cart_item->getBuyable()->getName() . ' has been updated');

        return redirect()->route('cart.show');
    }

    public function show()
    {
        return view('cart.show');
    }
}
