<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Konekt\Address\Models\CountryProxy;
use Vanilo\Cart\Contracts\CartManager;
use Vanilo\Checkout\Contracts\Checkout;
use Vanilo\Order\Contracts\OrderFactory;
use Vanilo\Product\Models\ProductProxy;
use Vanilo\Order\Models\OrderProxy;
use App\Website;
use App\ModuleData;
use Illuminate\Support\Str;
use App\User;
class CheckoutController extends Controller
{
    /** @var Checkout */
    private $checkout;

    /** @var Cart */
    private $cart;

    public function __construct(Checkout $checkout, CartManager $cart)
    {
        $this->checkout = $checkout;
        $this->cart     = $cart;
    }

    public function show()
    {
        $checkout = false;

        if ($this->cart->isNotEmpty()) {
            $checkout = $this->checkout;
            if ($old = old()) {
                $checkout->update($old);
            }

            $checkout->setCart($this->cart);
        }

        return view('checkout.show', [
            'checkout'  => $checkout,
            'countries' => CountryProxy::all()
        ]);
    }

    public function submit(CheckoutRequest $request, OrderFactory $orderFactory)
    {

        $this->checkout->update($request->all());
        $this->checkout->setCustomAttribute('notes', $request->get('notes'));
		$this->checkout->setCustomAttribute('isWebsite', "");
        $this->checkout->setCart($this->cart);
        $order = $orderFactory->createFromCheckout($this->checkout);
		foreach ($order->items()->get() as $key => $value) {
			$p = ProductProxy::find($value->product_id);
			if($p->html != 0){

				$o = OrderProxy::find($order->id);
				$o->isWebsite = $p->id;
				$o->save();
				$user = User::find($request->user()->id);
				$user->website = $p->id;
				$user->save();
				$website = Website::create([
					"user" => $order->user_id,
					"product" => $p->id,
					"slug" => Str::slug($request->user()->name . " ". $request->user()->id,"-"),
					"status" => "nonvisible",
					"active_modules" => [
						"home" => true,
						"schedule" => false,
						"registry" => false,
						"photos" => false,
						"sss" => false
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
			}
		}
        $this->cart->destroy();

        return view('checkout.thankyou', ['order' => $order]);
    }

}
