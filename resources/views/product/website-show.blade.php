@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/website-detay.css') }}">

@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('.color-wrapper').click(function(){
			var p_url = '{!! route('product.website_show',$product) !!}';
			window.location.href = p_url + "/" + $(this).data('color');
		});
	});
</script>
@endsection

@section('content')
<section class="website-detail">
	<div class="container">
		<div class="row">
			<div class="col-md-7 image">

				@foreach($product_images[$selected_color] as $med)
					<img src="{{url('/storage/'.$med->id.'/'.$med->file_name)}}" id="product-image" style="width:100%;"/>
				@endforeach
			</div>
			<div class="col-md-5 detail">
				<h1 class="title">{{$product->name}}</h1>
				<h3 class="price">{{ format_price($product->price) }}</h3>
				<h3 class="color-title">RENK:</h3>
				<div class="colors">
					@unless(empty($product->propertyValues->toArray()))
		                @foreach($color_property_values as $property)
						<a href="javascript:void(0);">
							<div class="color-wrapper {{$selected_color == $property ? ('active'):("")}}" data-color="{{$property}}">
								<div  class="color" style="background-color: {{$property}};"></div>
							</div>
						</a>
						@endforeach
					@endunless
				</div>
				<div class="buttons">
					<form action="{{ route('cart.add', ['id' => $product->id,'color' => $product->color]) }}" method="post" class="mb-4">
	                    {{ csrf_field() }}
						<button type="submit" class="customize-btn">Satın Al</button>
	                </form>

					<a href="/websites/{{$demo}}/demo.html" target="_blank" class="preview-btn">Önizleme</a>
				</div>
				@unless(empty($product->description))
					<div class="description">
						<h4 class="s-title">Açıklama</h4>
						<p>
							{!!  nl2br($product->description) !!}
						</p>
					</div>
                @endunless

				<div class="description">
					<h4 class="s-title">Ayrıntılar</h4>
					<p>
					{!!  nl2br($product->excerpt) !!}
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
