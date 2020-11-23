@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-index.css') }}">
@endsection
@section('content')
<section class="sss">
	<div class="container">
		<div class="row">
			<h1 class="title">Sıkça Sorulan Sorular</h1>
			<span class="subtitle">Aklınıza takılan ya da bilmek istediğiniz soruların yanıtlarına ulaşın.</a>
		</div>
		<div class="row questions"  style="height:auto;">
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

	</div>
</section>
@endsection
