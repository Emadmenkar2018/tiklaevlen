@extends('layouts.main')
@section('styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<style>
	.checkout_ul{
		margin:0;
		padding:0;
		list-style-type: none;
	}
	.checkout_ul li a{
		font-family:  'Source Sans Pro';
		font-weight: 400;
		font-size: 14px;
		color: #333333;
	}
	.checkout-btn{
		border:1px solid #29ABE2;
		background: #29ABE2;
		border-radius: 19px;
		font-family:  'Source Sans Pro';
		font-weight: 700;
		font-size: 14px;
		color: #FFFFFF;
		letter-spacing: 0;
		width:100%;
		height: 40px;
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 24px;
	}
	.ch-form{
		margin-top:50px;
		margin-bottom: 50px;
	}
	.checkoutbox{
		background: #FFFFFF;
		box-shadow: 0 2px 28px 0 rgba(0,0,0,0.05);
		border-radius: 9px;
		padding-left:50px;
		padding-right: 50px;
		padding-bottom: 30px;
		padding-top: 30px;
		margin-bottom:20px;
	}
	label{
		font-family:  'Source Sans Pro';
		font-weight: 400;
		font-size: 14px;
		color: #333333;
	}
	.checkoutbox h3{
		font-family:  'Source Sans Pro';
		font-weight: 700;
		font-size: 14px;
		color: #333333;
	}
	.kargo{
		font-family:  'Source Sans Pro';
		font-weight: 400;
		font-size: 14px;
		color: #333333;
	}
	.kargo input{
		margin-right: 5px;
	}
	 input[type="text"]{
		border: 1px solid #E6E6E6;
		border-radius: 20.5px!important;
		height: 40px;
		font-family:  'Source Sans Pro';
		font-weight: 400;
		font-size: 12px;
		color: #777677;
	}
	 input[type="text"]:focus{
		border-color: #29ABE2;
	}
	textarea{
	   border: 1px solid #E6E6E6;
	   border-radius: 20.5px!important;
	   height: 250px;
	   font-family:  'Source Sans Pro';
	   font-weight: 400;
	   font-size: 12px;
	   color: #777677;
   }
	textarea:focus{
	   border-color: #29ABE2;
   }
	select{
		border: 1px solid #E6E6E6;
		border-radius: 20.5px!important;
		height: 40px;
		font-family:  'Source Sans Pro';
		font-weight: 400;
		font-size: 12px;
		color: #777677;
		appearance: none;
		-webkit-appearance: none;
		-moz-appearance: none;
	}
	#shipping-address{
		margin-top: 20px;
	}
</style>
@endsection
@section('content')
    <style>
        .product-image {
            max-width: 100%;
            display: block;
            margin-bottom: 2em;
        }
    </style>
    <div class="container ch-form">
        <div class="row">
            <div class="col-md-8">
				@unless ($checkout)
					<div class="alert alert-warning">
						<p>Hey, nothing to check out here!</p>
					</div>
				@endunless

				@if ($checkout)
					<form style="margin-bottom: 30px;" id="checkout" action="{{ route('checkout.submit') }}" method="post">
						{{ csrf_field() }}
						<div class="checkoutbox">
							<div class="form-group row">
								<h3>TESLİMAT BİLGİLERİ</h3>
							</div>
							<div class="form-group">
								<div class="col-md-12 row d-flex justify-content-between" style="flex-wrap:wrap;">
									<div class="kargo">
										<input type="radio" name="options" value="red" autocomplete="off" checked> Aras Kargo(Ücretsiz)
									</div>
									<div class="kargo">
										<input type="radio" name="options" value="red" autocomplete="off"> Yurtiçi Kargo(7.25 TL)
									</div>
									<div class="kargo">
										<input type="radio" name="options" value="red" autocomplete="off" checked> UPS(10 TL)
									</div>
									<div class="kargo">
										<input type="radio" name="options" value="red" autocomplete="off" checked> Hızlı Teslimat(50 TL)
									</div>
								</div>
							</div>
						</div>
						@include('checkout._billpayer', ['billpayer' => $checkout->getBillPayer()])
						<div class="checkoutbox">
							<div class="form-group row">
								<h3>ÖDEME BİLGİLERİ</h3>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									{{ Form::text('billpayer[lastname]', null, [
											'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
											'placeholder' => __('Kart Sahibi')
										])
									}}
								</div>
								<div class="col-md-6">
									{{ Form::text('billpayer[lastname]', null, [
											'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
											'placeholder' => __('Kart Numarası')
										])
									}}
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-4">
									{{ Form::text('billpayer[lastname]', null, [
											'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
											'placeholder' => __('AA')
										])
									}}
								</div>
								<div class="col-md-4">
									{{ Form::text('billpayer[lastname]', null, [
											'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
											'placeholder' => __('YYYY')
										])
									}}
								</div>
								<div class="col-md-4">
									{{ Form::text('billpayer[lastname]', null, [
											'class' => 'form-control' . ($errors->has('billpayer.lastname') ? ' is-invalid' : ''),
											'placeholder' => __('CVV')
										])
									}}
								</div>
							</div>
						</div>
						<div class="checkoutbox">

							<div class="form-group row">
								<h3>SİPARİŞ NOTLARI</h3>
								{{ Form::textarea('notes', null, [
										'class' => 'form-control' . ($errors->has('notes') ? ' is-invalid' : ''),
										'rows' => 3
									])
								}}
								@if ($errors->has('notes'))
									<div class="invalid-feedback">{{ $errors->first('notes') }}</div>
								@endif
							</div>
						</div>


						<div>
							<ul class="checkout_ul">
							<li>
								<input type="checkbox" name="Mesafeli_Satış_Sözleşmesi"> <span><a href="/mesafeli-satis-sozlesmesi"><u>Mesafeli Satış Sözleşmesini</u> kabul ediyorum.</a></span>
							</li>
							<li>
								<input type="checkbox" name="Ön_Bilgilendirme_Formu"> <span><a href="/on-bilgilendirme-formu"><u>Ön bilgilendirme formunu</u> kabul ediyorum.</a></span>
							</li>
							<li>
								<input type="checkbox" name="Aydınlatma_Formu"> <span><a href="/kisisel-verilerin-korunmasi-aydinlatma-metni"><u>Aydınlatma formunu</u> kabul ediyorum.</a></span>
							</li>
						</ul>
							<button class="checkout-btn">SİPARİŞ VER</button>
						</div>


					</form>
				@endif
            </div>
            <div class="col-md-4">
				<div class="checkoutbox">
					@include('cart._summary')
				</div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
	document.addEventListener("DOMContentLoaded", function(event) {
		new Vue({
			el: '#checkout',
			data: {
				isOrganization: {{ old('billpayer.is_organization') ?: 0 }},
				shipToBillingAddress: {{ old('ship_to_billing_address') ?? 1 }}
			}
		});
	});
</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
