<div class="col-md-4 theme">
	<div class="img-wrapper">
		@foreach($product->product_images as $img_key => $imgs)
			<div class="product_image p_img_{{$product->id}} p_img_{{$product->id}}_{{$img_key}} {{$img_key == $product->active_color ? ('active'):('')}}">
				<a href="{{ route('product.davetiye_show', $product) }}" class="product_link_{{$product->id}}" data-baselink="{{ route('product.davetiye_show', $product) }}">
					<img class="card-img-top" src="/storage/{{$imgs[0]->id}}/{{$imgs[0]->file_name}}" alt="{{ $product->name }}" />
				</a>
				<div class="tmask">
					<form action="{{ route('cart.add',  ['id' => $product->id,'color' => $product->active_color]) }}" method="post" class="mb-4">
	                    {{ csrf_field() }}
						<button type="submit" class="registry-btn">SEPETE EKLE</button>
	                </form>
				</div>
			</div>
		@endforeach
	</div>
	<a href="{{ route('product.davetiye_show', $product) }}" data-baselink="{{ route('product.davetiye_show', $product) }}" class="product_link_{{$product->id}}"><h2 class="title">{{ $product->name }}</h2></a>
	<span class="price">{{ format_price($product->price) }}</span>
	<div class="colors" style="display:flex;">
		@if($product->colors)
			@php
				$i = 0;
			@endphp
			@foreach($product->colors as $color)
				<a href="javascript:void(0);">
					<div data-product="{{$product->id}}" data-color="{{$color}}" class="color-wrapper product-color color {{$color}} product-color{{$product->id}} {{$color == $product->active_color ? ('active'):('')}}">
						<div class="color-b" style="background-color:{{$color}};"></div>
					</div>
				</a>
				@php
					$i++;
				@endphp
			@endforeach
		@endif
	</div>

</div>
