@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-index.css') }}">
@endsection
@section('content')
<section class="header d-flex align-items-center">
	<div class="container">
		<div class="row">
			<h1 class="title">Düğün Siteni<br/>Hemen Hazırla!</h1>
			<ul>
				<li>Düğün temanız için mükemmel tasarımlar</li>
				<li>Kullanımı kolay, özelleştirilebilir şablonlar</li>
				<li>Sizin ve davetlilerinizin ihtiyaç duyduğu tüm özellikler</li>
			</ul>
			<a class="buy-btn" href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 2]) }}">
				Web Sitenizi Oluşturun
			</a>
		</div>
	</div>
</section>
<section class="wt-seemore">
	<div class="container">
		<div class="row">
			<h1 class="title">100'den fazla Ücretsiz Web Sitesi Tasarımı</h1>
		</div>
		<div class="row wt">
			<div class="col-md-3 wt-item">
				<a href="#">
					<img src="{{url('img/website-1.jpg')}}" />
				</a>
			</div>
			<div class="col-md-3 wt-item">
				<a href="#">
					<img src="{{url('img/website-2.jpg')}}" />
				</a>
			</div>
			<div class="col-md-3 wt-item">
				<a href="#">
					<img src="{{url('img/website-3.jpg')}}" />
				</a>
			</div>
			<div class="col-md-3 wt-item">
				<a href="#">
					<img src="{{url('img/website-4.jpg')}}" />
				</a>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 2]) }}" class="see-more-btn">Tüm Tasarımları Gör</a>
		</div>
	</div>
</section>
<section class="why-love">
	<div class="container">
		<div class="row">
			<h1 class="title">Düğün Siteniz İçin Güçlü Özellikler</h1>
		</div>
		<div class="row items">
			<div class="col-md-4 item">
				<img src="{{url('img/why-love-icon-1.png')}}" width="127"/>
				<h3 class="item-title">Davetliler İçin Kolay Kullanım</h3>
				<p class="item-desc">
					Kolayca davet listenizi ve hediye listenizi oluşturun. Davetliler LCV yapabilir, ihtiyacınız olan hediyeyi sizin için alabilirler.
				</p>
			</div>
			<div class="col-md-4 item">
				<img src="{{url('img/why-love-icon-2.png')}}" width="118"/>
				<h3 class="item-title">Uyumlu Davetiye</h3>
				<p class="item-desc">
					Her bütçe için yüzlerce güzel, uygun fiyatlı tasarım Ücretsiz misafir adresleme, ücretsiz gönderim ve daha fazlası.
				</p>
			</div>
			<div class="col-md-4 item">
				<img src="{{url('img/why-love-icon-3.png')}}" width="103"/>
				<h3 class="item-title">Hızlı Özelleştirme</h3>
				<p class="item-desc">
					Basit, sürükle ve bırak oluşturucu ile dakikalar içinde harika web sitenizi oluşturun.
				</p>
			</div>
		</div>
	</div>
</section>
<section class="free-website">
	<div class="container">
		<div class="row">
			<h1 class="title">Ücretsiz Düğün Sitesi Nasıl Oluşturulur?</h1>
		</div>
		<div class="row steps">
			<div class="col-md-4 step">
				<h2>
					1- Bir Tasarım Seçin
				</h2>
				<p>
					İster klasik, ister rengarenk, ciddi veya eğlenceli, her çift ve her düğün teması için mükemmel bir web sitesi var.
				</p>
			</div>
			<div class="col-md-4 step">
				<h2>
					2- Özelleştirin
				</h2>
				<p>
					Şablonu kendi düğün detaylarınız, fotoğraflarınız, hikayeniz, davet listeniz, seyahat bilgileriniz ve daha fazlası ile doldurun.
				</p>
			</div>
			<div class="col-md-4 step">
				<h2>
					3- Misafirlerle Paylaşın
				</h2>
				<p>
					Tarihlerinizi kaydedin ve web sitenizin linkini davetlilerinizle paylaşın. Onlar LCV yaparken siz de takip edin.
				</p>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 2]) }}" class="buy-btn">Web Sitenizi oluşturun</a>
		</div>
	</div>
</section>
<section class="registry-website">
	<div class="left">
		<div class="content">
			<h2>Düğün Alışverişi Hiç Bu Kadar <br/>Kolay Olmamıştı!</h2>
			<p>
				DüğünHediyem'e üye olun, benzersiz web sitenizi kolayca oluşturun. Tarihleri ve programınızı belirleyin. Evinizin bütün ihtiyaçlarını Hediye listenize ekleyin sonra davetlilerinizle paylaşın. İsterseniz bir fon bile oluşturabilirsiniz.
			</p>
			<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 2]) }}" class="website-btn">Web Sitenizi oluşturun</a>
		</div>
	</div>
	<div class="right"></div>
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
					DüğünHediyem nedir?
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
