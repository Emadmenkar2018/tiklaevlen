<div class="col-md-4 theme">
	<div class="img-wrapper">
		@foreach($product->product_images as $img_key => $imgs)
			<div class="product_image p_img_{{$product->id}} p_img_{{$product->id}}_{{$img_key}} {{$img_key == $product->active_color ? ('active'):('')}}">
				<a href="{{ route('product.show', $product) }}" class="product_link_{{$product->id}}" data-baselink="{{ route('product.show', $product) }}">
					<img class="card-img-top" src="/storage/{{$imgs[0]->id}}/{{$imgs[0]->file_name}}" alt="{{ $product->name }}" />
				</a>
				<div class="tmask">
					<form action="{{ route('cart.add',  ['id' => $product->id,'color' => $product->active_color]) }}" method="post" class="mb-4">
	                    {{ csrf_field() }}
						<button type="submit" class="registry-btn">Sepete Ekle</button>
	                </form>
					<a href="javascript:void(0);" data-product="{{$product->id}}" data-activecolor="{{$product->active_color}}" class="add-registry add-registry{{$product->id}} registry-btn registry-btn2" @if(!$product->registry) style="display:flex;" @else style="display:none;" @endif>Hediye Listesine Ekle</a>
					<a data-product="{{$product->id}}"  href="javascript:void(0);"  @if($product->registry) data-registry="{{$product->registry->id}}" @endif class="remove-registry remove-registry{{$product->id}} registry-btn registry-btn2"  @if($product->registry) style="display:flex;" @else style="display:none;" @endif>Hediye Listesinden Kaldır</a>
				</div>
			</div>
		@endforeach
	</div>
	<a href="{{ route('product.show', $product) }}" data-baselink="{{ route('product.show', $product) }}" class="product_link_{{$product->id}}"><h2 class="title">{{ $product->name }}</h2></a>
	<span class="price">{{ format_price($product->price) }}</span>
	<div class="colors" style="display:flex;margin-bottom:20px;">
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
