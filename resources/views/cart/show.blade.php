@extends('layouts.main')
@section('styles')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="cart_title">Sepetim</h1>
		</div>
	</div>
	@if(Cart::isEmpty())
		<div class="row cart_no-item">
			<div class="col-md-12">
				Sepetinizde ürün bulunmamaktadır.
			</div>
		</div>
	@else
	<div class="row">
		<div class="col-md-12">
			<div class="rounded bg-white">

				<table class="table table-borderless">
					<thead>
					<tr>
						<th>Ürün Adı</th>
						<th>Fiyat</th>
						<th>Adet</th>
						<th>Toplam</th>

					</tr>
					</thead>
					<tbody>
					@foreach(Cart::getItems() as $item)

						<tr class="cart_item">
							<td>
								<a href="{{ route('product.show', $item->product) }}">
									{{ $item->product->getName() }} - {{$item->color}}
								</a></td>
							<td>{{ format_price($item->price) }}</td>
							<td>
								<form class="form-inline" action="{{ route('cart.update', $item) }}" method="POST">
									@csrf
									<input type="text" class="cart-qty" name="qty" value="{{ $item->quantity }}" class="w-25" />
								</form>
							</td>
							<td>{{ format_price($item->total) }}</td>
							<td>
								<form action="{{ route('cart.remove', $item) }}"
									  style="display: inline-block" method="post">
									{{ csrf_field() }}
									<button dusk="cart-delete-{{ $item->getBuyable()->id }}" class="btn btn-link btn-sm"><span class="text-danger">&xotime;</span></button>
								</form>
							</td>
						</tr>
					@endforeach
						<tr class="cart_item">
							<td colspan="2" class="c_total">Toplam: {{ format_price(Cart::total()) }}</td>

						</tr>

					</tbody>
				</table>
				<div class="c_bottom">
					<a href="/" class="c-shopping">Alışverişe Devam Et</a>
					<a href="{{ route('checkout.show') }}" class="cart-btn">Sepeti Onayla</a>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
@endsection
