@extends('layouts.main')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/davet-detay.css') }}">

@endsection

@section('scripts')
<script src="{{ asset('js/owl.carousel2.thumbs.js') }}"></script>
<script>
	$(document).ready(function(){
		$('.color-wrapper').click(function(){
			var p_url = '{!! route('product.davetiye_show',$product) !!}';
			window.location.href = p_url + "/" + $(this).data('color');
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			loop: true,
			items: 1,
			thumbs: true,
			thumbImage: true,
			thumbContainerClass: 'owl-thumbs row',
			thumbItemClass: 'col-2'
		});

		$('.qty-prop select').change(function(){
			var qty = $(this).find('option:selected').attr('value');
			if(qty != 0){
				$('.selected-qty').html(qty);
			}
			else{
				$('.selected-qty').html("");
			}
		})
		$('.color-prop .color-wrapper').click(function(){
			$('.color-wrapper').removeClass('active');
			$(this).addClass('active');
			var color = $(this).data('title');
			$('.selected-color').html(color);
		});
		$('.paper-prop li').click(function(){
			$('.paper-prop li').removeClass('active');
			$(this).addClass('active');
			$('.selected-paper').html($(this).html());
		});
		$('.shape-prop .shape').click(function(){
			var shape = $(this).data('title');
			$('.shape-prop .shape').removeClass('active');
			$(this).addClass('active');
			$('.selected-shape').html(shape);
		})
	});
</script>
@endsection

@section('content')
<section class="davetiye-detail">
	<div class="container">
		<div class="row">
			<div class="col-md-7 image">

				<div class="owl-carousel detail-slider">
					@foreach($product_images[$selected_color] as $med)
					<div data-thumb="{{url('/storage/'.$med->id.'/'.$med->file_name)}}">
						<img src="{{url('/storage/'.$med->id.'/'.$med->file_name)}}" id="product-image" style="width:100%;"/>
					</div>

					@endforeach
				</div>
			</div>
			<div class="col-md-5 detail">
				<h1 class="title">{{$product->name}}</h1>
				<h3 class="price">{{ format_price($product->price) }}</h3>
				<div class="qty-prop">
					<h3 class="prop-title">ADET: <span class="selected-qty"></span></h3>
					<select class="">
						<option value="0">Adet Seçiniz</option>
						<option value="100">100</option>
						<option value="200">200</option>
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="2000">2000</option>
					</select>
				</div>
				<div class="color-prop">
					<h3 class="prop-title">RENK: <span class="selected-color"></span></h3>
					<div class="colors">

						@unless(empty($product->propertyValues->toArray()))
			                @foreach($color_property_values as $property)
							<a href="javascript:void(0);">
								<div class="color-wrapper {{$selected_color == $property ? ('active'):("")}}" data-color="{{$property}}" data-title="{{$property}}">
									<div  class="color" style="background-color: {{$property}};"></div>
								</div>
							</a>
							@endforeach
						@endunless
					</div>
				</div>
				<div class="paper-prop">
					<h3 class="prop-title">KAğIT: <span class="selected-paper"></span></h3>
					<ul>
						<li>Pürüzsüz</li>
						<li>Amerikan Bristol</li>
						<li>Birinci Hamur</li>
						<li>Krem Fantezi Kağıtlar</li>
					</ul>
				</div>
				<div class="shape-prop">
					<h3 class="prop-title">ŞEKİL: <span class="selected-shape"></span></h3>
					<div class="shapes">
						<div class="shape square" data-shape="square" data-title="Kare"></div>
						<div class="shape round" data-shape="round" data-title="Yuvarlak"></div>
					</div>

				</div>
				<div class="buttons">
					<form action="{{ route('cart.add', ['id' => $product->id,'color' => $product->color]) }}" method="post" class="mb-4">
	                    {{ csrf_field() }}
						<button type="submit" class="customize-btn">Satın Al</button>
	                </form>
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
				<div class="description" style="display:none;">
					<h4 class="s-title">Tahmini Varış</h4>
					<p>
						Tüm siparişler ücretsiz gönderilir ve 5-10 iş günü içinde teslim edilir. Not: Uzun nakliye süreleri nedeniyle uluslararası olarak veya Alaska ve Hawaii'ye gönderim yapmıyoruz.
					</p>
				</div>
				<div class="description" style="display:none;">
					<h4 class="s-title">Kargo İade</h4>
					<p>
						Uzmanlarımız, davetiyeyle ilgili tüm sorularınızı cevaplayacaktır. Ayrıca, çalışmanızı yazdırılmadan önce kanıtlamanıza ve son dakikada bir hata tespit etmeniz durumunda iki saatlik bir iptal penceresine sahip olmanıza izin vereceğiz.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="related">
	<div class="container">
		<h1 class="title">Diğer Davetiye Tasarımlarına Gözatın</h1>
		<div class="row">
			<div class="col-md-3 item">
				<div class="item-inner">
					<a href="#"><img src="{{ asset('img/related-davetiye.jpg') }}" /></a>
					<a href="#"><h2 class="item-title">Davet - Octavia portre</h2></a>
					<span class="price">34,00 ₺</span>
					<div class="colors">
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 item">
				<div class="item-inner">
					<a href="#"><img src="{{ asset('img/related-davetiye.jpg') }}" /></a>
					<a href="#"><h2 class="item-title">Davet - Octavia portre</h2></a>
					<span class="price">34,00 ₺</span>
					<div class="colors">
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 item">
				<div class="item-inner">
					<a href="#"><img src="{{ asset('img/related-davetiye.jpg') }}" /></a>
					<a href="#"><h2 class="item-title">Davet - Octavia portre</h2></a>
					<span class="price">34,00 ₺</span>
					<div class="colors">
						<a href="#">
							<div class="color-wrapper" data-color="red">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper" data-color="blue">
								<div class="color" style="background-color: blue;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper" data-color="yellow">
								<div class="color" style="background-color: yellow;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper" data-color="green">
								<div class="color" style="background-color: green;"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 item">
				<div class="item-inner">
					<a href="#"><img src="{{ asset('img/related-davetiye.jpg') }}" /></a>
					<a href="#"><h2 class="item-title">Davet - Octavia portre</h2></a>
					<span class="price">34,00 ₺</span>
					<div class="colors">
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
						<a href="#">
							<div class="color-wrapper">
								<div class="color" style="background-color: red;"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
