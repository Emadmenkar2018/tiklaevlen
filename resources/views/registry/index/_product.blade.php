<div class="col-md-4 theme">
	<div class="img-wrapper">
		@foreach($product->product_images as $img_key => $imgs)
			<div class="product_image p_img_{{$product->id}} p_img_{{$product->id}}_{{$img_key}} {{$img_key == $product->active_color ? ('active'):('')}}">
				<a href="{{ route('product.show', $product) }}" class="product_link_{{$product->id}}" data-baselink="{{ route('product.show', $product) }}">
					<img class="card-img-top" src="{{url('/storage/'.$imgs[0]->id.'/'.$imgs[0]->file_name)}}" alt="{{ $product->name }}" />
				</a>
			</div>
		@endforeach
	</div>
	<a href="{{ route('product.show', $product) }}" data-baselink="{{ route('product.show', $product) }}" class="product_link_{{$product->id}}"><h2 class="title">{{ $product->name }}</h2></a>
	<span class="price">{{ format_price($product->price) }}</span>

	<div class="colors" style="display:flex;">
		@if($product->colors)
			@php
				$i = 0;
			@endphp
			@foreach($product->colors as $color)
				<div data-prop="color,{{$color}}" data-registry="{{$product->registry->id}}" class="color-wrapper registry-color product-color color {{$color}} product-color{{$product->id}} {{'color,'.$color == $product->registry->property ? ('active'):('')}}" data-product="{{$product->id}}" data-color="{{$color}}">
					<div class="color-b" style="background-color:{{$color}};"></div>
				</div>
				@php
					$i++;
				@endphp
			@endforeach
		@endif
	</div>
	<div class="non-registry-view non-registry-view{{$product->id}}" style="display:block;">
		<div style="display:flex;justify-content:space-between;margin-bottom:10px;margin-top:20px;">
			<input type="number" class="registry-quantity quantity{{$product->id}}" value="{{$product->registry->quantity}}" style="width:48%;"/>
			<a href="javascript:void(0);" data-registry="{{$product->registry->id}}" data-product="{{$product->id}}" class="update-quantity float-right pt-0 pb-0 registry-btn"  style="width:48%;">Güncelle</a>
		</div>

		<a data-product="{{$product->id}}" href="javascript:void(0);" data-registry="{{$product->registry->id}}" class="remove-registry remove-registry2 remove-registry{{$product->id}} registry-btn " style="width:100%;">Hediye Listesinden Kaldır</a>
	</div>

</div>
