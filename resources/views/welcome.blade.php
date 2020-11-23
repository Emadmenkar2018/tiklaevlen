@extends('layouts.main')
@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.brands-slider').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			navText:['<i class="flaticon-prev"></i>','<i class="flaticon-next"></i>'],
			responsive:{
				0:{
					items:1,
					nav:false,
					margin:0,
				},
				600:{
					items:3,

				},
				1000:{
					items:3
				}
			}
		});

	});
</script>
@endsection
@section('content')
<section class="index-header d-flex">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="title"><b>Davet ve Alışverişin</b><br/>En Kolay Hali!</h1>
				<p>
					Düğün Siteni ve Davetiyeni kolayca oluştur,<br/>
					Hediyelerini seç, Davetlilerle paylaş...
				</p>
				@if(Auth::user())
					<a class="buy-btn" href="/shop/c/urunler/3" style="border-color:#a43143;background-color:#a43143;">Hemen Başla</a>
				@else
				<a class="buy-btn" href="/register" style="border-color:#a43143;background-color:#a43143;">Hemen Başla</a>
				@endif
			</div>

		</div>
	</div>
</section>

<section class="why-love">
	<div class="container">
		<div class="row">
			<h1 class="title">İhtiyacınız Olan Her Şey Burada</h1>
		</div>
		<div class="row items">
			<div class="col-md-4 item">
				<div style="height:100px;margin-bottom:20px;"><img src="{{url('img/why-love-icon-5.png')}}" width="105"/></div>
				<h3 class="item-title">Hediye Listesi</h3>
				<p class="item-desc">
					Kolayca davet listenizi ve hediye listenizi oluşturun. Davetliler LCV yapabilir, ihtiyacınız olan hediyeyi sizin için alabilirler.
				</p>
			</div>
			<div class="col-md-4 item">
				<div style="height:100px;"><img src="{{url('img/why-love-icon-6.png')}}" width="105"/></div>
				<h3 class="item-title">Ücretsiz Düğün Sitesi</h3>
				<p class="item-desc">
					Kodlama bilmeden bedava bir site oluşturun. Bir tasarım seçin, kendinize uyarlayın ve sitenizi hemen yayınlayın!
				</p>
			</div>
			<div class="col-md-4 item">
				<div style="height:100px;"><img src="{{url('img/why-love-icon-7.png')}}" width="91"/></div>
				<h3 class="item-title">Benzersiz Düğün Davetiyesi</h3>
				<p class="item-desc">
					Her bütçe için yüzlerce güzel, uygun fiyatlı tasarım Ücretsiz misafir adresleme, ücretsiz gönderim ve daha fazlası.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="registry-row  d-flex align-items-center">
	<div class="container">
		<div class="row">
			<h1 class="title">Sana Özel Düğün Davetiyeni Kolayca Oluştur</h1>
			<ul>
				<li>Her bütçe için yüzlerce güzel, uygun fiyatlı tasarım</li>
				<li>Ücretsiz misafir adresleme, ücretsiz gönderim ve daha fazlası</li>
				<li>Davetiyeniz ile uyumlu ücretsiz web siteniz</li>
			</ul>
			<a class="buy-btn" href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}">
				Hemen Satın Alın
			</a>
		</div>
	</div>
</section>
<section class="brands">
	<div class="container">
		<h1 class="title">En Son Eklenen Ürünler</h1>
		<div class="row">
			{{-- <div class="owl-carousel brands-slider">
				@foreach($last_products as $product)
					<div class="brand item">
						<a href="{{ route('product.show', $product) }}">
							@foreach($product->product_images as $img_key => $imgs)
								@if($img_key == $product->active_color)
									{{$imgs[0]}}
								@endif
							@endforeach
							<h2 class="brand-title">{{$product->name}}</h2>
							<h2 class="brand-title">{{ format_price($product->price) }}</h2>
						</a>
					</div>
				@endforeach
			</div> --}}

		</div>
	</div>
</section>
<section class="sss">
	<div class="container">
		<div class="row">
			<h1 class="title">Sıkça Sorulan Sorular</h1>
			<span class="subtitle">Aklınıza takılan ya da bilmek istediğiniz soruların yanıtlarına ulaşın.</a>
		</div>
		<div class="row questions">
			<div class="col-md-6 question">
				<h2>
					DüğünHediyem nedir?
				</h2>
				<p>
					DüğünHediyem, düğün web sitesi, davetiye, hediye listesi, davetli listesi ve alışveriş dahil olmak üzere ücretsiz bir düğün planlama sitesidir. Düğün hikayenizi, fotoğraflar ve tüm ayrıntılarıyla güzel, kolay düzenlenebilir tasarımlarımızdan biriyle size özel ücretsiz bir düğün web sitesi oluşturun.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					DüğünHediyem Nasıl Çalışır?
				</h2>
				<p>
					DüğünHediyem'e kolayca üye olursunuz. Düğün tarihinizi ve eşinizi eklersiniz. Misafirlerinizi rehberinizden veya sosyal medya hesaplarından davet edersiniz. Düğün web sitenizi ve davetiyenizi oluşturursunuz. Alışverişinizi ister kendiniz yapar isterseniz listenizi katkıda bulunmaları için misafirlerinizle paylaşırsınız. Düğün alışverişi hiç bu kadar keyifli olmamıştı..
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					DüğünHediyem'e neden üye olmalıyım?
				</h2>
				<p>
					Biz de sizin gibi Düğün alışverişinin kolay olması gerektiğini düşünüyoruz. Düğün alışverişinizi bir çok farklı siteden yapmak zorunda kaldığınızın farkındayız. Çiftlerin en sevdiği markaları ve ürünleri en uygun fiyatlarla bir araya getirdik ve bunları size destek olması için misafirlerinizle paylaşıyoruz. Ayrıca web sitenizi ve davetiyenizi de ücretsiz oluşturabilirsiniz.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					DüğünHediyem'e üye olmak neden ücretsiz?
				</h2>
				<p>
					Önceliğimiz size kolay ve güvenli bir alışveriş deneyimi yaşatmak. Biz online bir mağazayız ve herhangi bir perakendeci gibi, sattığımız ürünlerden para kazanıyoruz. Bu yüzden çiftlere düğün planlamalarını kolaylaştırmaya yardımcı olacak ücretsiz araçlar sunuyoruz.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					Üye olmak zor mu?
				</h2>
				<p>
					Üye olmayı sizin için kolaylaştırdık. Birkaç basit soruyla başlıyoruz ve düğün web siteniz hazırlanmış oluyor. <a href="{{route('register')}}">Buradan</a> başlayabilirsiniz.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					DüğünHediyem'den çevremdekileri nasıl haberdar edebilirim?
				</h2>
				<p>
					DüğünHediyem'i beğenmeniz bizi mutlu etti. Paylaşımlarınızı buradan davet yoluyla yapabilirsiniz. Böylelikle alışveriş listeniz için katkıda bulunabilirler.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					Hediye Listesi nedir?
				</h2>
				<p>
					Hediye Listesi düğün alışverişinizin tümüdür. Davetlilerle katkıda bulunmaları için paylaşabileceğiniz alışveriş listenizdir.
				</p>
			</div>
			<div class="col-md-6 question">
				<h2>
					Hediye Listesi nasıl oluşturulur?
				</h2>
				<p>
					Ürünlerin üzerine geldiğinizde Sepete Ekle ve Hediye Listesine Ekle şeklinde iki seçenek çıkacaktır. Hediye Listesine eklediğinizde misafirlerinizle paylaşabileceğiniz hediye listeniz oluşur. Bu listeyi en üst menüdeki Hediye Listem linkinden görebilir ve düzenleyebilirsiniz.
				</p>
			</div>
		</div>
		<div class="loadmore">
			<i class="flaticon-arrow-down"></i>
		</div>
	</div>
</section>
@endsection
