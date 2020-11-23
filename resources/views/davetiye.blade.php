@extends('layouts.main')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/davet-index.css') }}">
@endsection
@section('scripts')

@endsection
@section('content')
	<section class="header d-flex align-items-center">
		<div class="container">
			<div class="row">
				<h1 class="title">Sana Özel Düğün <br/>Davetiyeni Kolayca Oluştur</h1>
				<ul>
					<li>Her bütçe için yüzlerce güzel, uygun fiyatlı tasarım</li>
					<li>Ücretsiz misafir adresleme, ücretsiz gönderim ve daha fazlası</li>
					<li>Davetiyeniz ile uyumlu ücretsiz web siteniz</li>
				</ul>
				<a class="buy-btn" href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}">
					Şimdi Satın Alın
				</a>
			</div>
		</div>
	</section>
	<section class="dv-seemore">
		<div class="container">
			<div class="row">
				<h1 class="title">En Popüler Davetiye Tasarımlarımız</h1>
			</div>
			<div class="row dv">
				<div class="col-md-3 dv-item">
					<a href="#">
						<img src="{{url('img/davetiye-1.jpg')}}" />
					</a>
				</div>
				<div class="col-md-3 dv-item">
					<a href="#">
						<img src="{{url('img/davetiye-2.jpg')}}" />
					</a>
				</div>
				<div class="col-md-3 dv-item">
					<a href="#">
						<img src="{{url('img/davetiye-3.jpg')}}" />
					</a>
				</div>
				<div class="col-md-3 dv-item">
					<a href="#">
						<img src="{{url('img/davetiye-4.jpg')}}" />
					</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}" class="see-more-btn">Tüm Tasarımları Gör</a>
			</div>
		</div>
	</section>
	<section class="why-love">
		<div class="container">
			<div class="row">
				<h1 class="title">İhtiyacınız Olan Her Şey Burada</h1>
			</div>
			<div class="row items">
				<div class="col-md-4 item">
					<img src="{{url('img/why-love-icon-4.png')}}" width="99"/>
					<h3 class="item-title">Hediye Listesi</h3>
					<p class="item-desc">
						Bütçeniz dahilinde kalırken düşük fiyatlar ve ücretsiz gönderim ile ikinizi parlatacağız.
					</p>
				</div>
				<div class="col-md-4 item">
					<img src="{{url('img/why-love-icon-2.png')}}" width="118"/>
					<h3 class="item-title">Eşleştirme Süitler</h3>
					<p class="item-desc">
						Davetlerden programlara, menülere, hatta teşekkür kartlarına kadar her şeyi DüğünHediyem’de oluşturabilirsiniz.
					</p>
				</div>
				<div class="col-md-4 item">
					<img src="{{url('img/why-love-icon-3.png')}}" width="103"/>
					<h3 class="item-title">Özelleştirmesi Kolay</h3>
					<p class="item-desc">
						Süper basit oluşturucumuzla birkaç dakika içinde size özel kartlar olacak.
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="free-dv">
		<div class="container">
			<div class="row">
				<h1 class="title">DüğünHediyem'de Kart Nasıl Yapılır?</h1>
			</div>
			<div class="row steps">
				<div class="col-md-6 step">
					<h2>
						1- Bir Tasarım Seçin
					</h2>
					<p>
						Klasikten çiçeğe, zarif köşe şekillerine, lüks kağıtlara ve folyolara kadar her stil için bir şey var.
					</p>
				</div>
				<div class="col-md-6 step">
					<h2>
						2- Özelleştir
					</h2>
					<p>
						İfadeleri değiştirmek ister misiniz? Yazı Boyutu? Bir fotoğraf yükle? Her şeyi sezgisel kurucumuzla yapabilirsiniz.
					</p>
				</div>
				<div class="col-md-6 step">
					<h2>
						3- Ücretsiz Misafir Adresleme Alın
					</h2>
					<p>
						Sizin için tüm adres görgü araştırmasını yaptık, böylece değerli zaman ve paradan tasarruf edebilirsiniz.
					</p>
				</div>
				<div class="col-md-6 step">
					<h2>
						4- Kartlarınızı Yazdırın
					</h2>
					<p>
						Enjoy ücretsiz kargo düğün kağıt üzerinde ve 10 iş günü içinde kapıda bekliyoruz.
					</p>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}" class="buy-btn">Şimdi Satın Al</a>
			</div>
		</div>
	</section>
	<section class="davetiyeler">
		<div class="container">
			<div class="row">
				<div class="col-md-6 left">
					<div class="content">
						<h2>Seveceğiniz Benzersiz<br/>Düğün Davetiyeleri</h2>
						<p>
							İstediğiniz kadar resmi veya gündelik gidin, davet ifadeleri ile ilgili yardım alın ve eşleşen RSVP kartları ekleyin . Uygun fiyatlar ve ücretsiz gönderim ile bütçenizi asla etkilemezsiniz.
						</p>
						<a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}" class="website-btn">Davetiyeler</a>
					</div>
				</div>
				<div class="col-md-6 right">
					<img src="{{url('img/save-the-date.png')}}" />
				</div>
			</div>
		</div>

	</section>
	<section class="sss">
		<div class="container">
			<div class="row">
				<h1 class="title">Sıkça Sorulan Sorular</h1>
				<span class="subtitle">Aklınıza takılan ya da bilmek istediğiniz soruların yanıtlarına ulaşın.</a>
			</div>
			<div class="row questions">
				<div class="col-md-6 question">
					<h2>
						DüğünHediyem nedir?
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
