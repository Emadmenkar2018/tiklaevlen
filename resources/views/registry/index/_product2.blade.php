<div class="col-md-6 theme">
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

</div>
