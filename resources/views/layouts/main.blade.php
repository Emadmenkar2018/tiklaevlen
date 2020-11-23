<!doctype html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/flaticon.css') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900&display=swap&subset=latin-ext" rel="stylesheet">

		<link rel="manifest" href="{{url('manifest.json')}}">
		
		
		{{-- <script src="{{asset('serviceworker.js')}}"></script> --}}
		{{-- <script>
			if ('serviceWorker' in navigator) {
				window.addEventListener('load', function () {
					navigator.serviceWorker.register({{asset('serviceworker.js')}}).then(function (registration) {
						console.log('ServiceWorker registration :', registration.scope);
					}).catch(function (error) {
						console.log('ServiceWorker registration failed:', error);
					});
				});
			}
		</script> --}}

		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="msapplication-starturl" content="/">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="theme-color" content="#e5e5e5">


		<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/general.css') }}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@yield('styles')
		<title>Düğün Hediyem</title>
		@laravelPWA
	</head>
	<body>
		<section class="nav">
			<div class="topbar">
				<div class="container">
					<div class="row">
						<ul class="topmenu">
							<li class="dropdown" style="display:none;">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Heading 1 </a>
								<div class="dropdown-menu multi-column">
									<div class="row" style="margin:0;">
										<div class="col-md-6">
											<ul class="dropdown-menu">
												<li><a href="#">Create Registry</a></li>
												<li><a href="#">Registry Benefits</a></li>
												<li><a href="#">How It Works</a></li>
												<li><a href="#">Find A Couple</a></li>
											</ul>
										</div>
										<div class="col-md-6">
											<ul class="dropdown-menu">
												<li><a href="#">New Arrivals</a></li>
												<li><a href="#">Starter Collections</a></li>
												<li><a href="#">Brands</a></li>
												<li><a href="#">Kitchen</a></li>
												<li><a href="#">Tabletop</a></li>
											</ul>
										</div>
									</div>
								</div>
							</li>
							@guest
							<li><a href="{{ route('welcome') }}">Hediye Listesi</a></li>
							<li><a href="{{ route('website') }}">Websitesi</a></li>
							<li><a href="{{ route('davetiye') }}">Davetiye</a></li>
							@else
							<li><a href="{{ route('guests') }}">Kayıt Listem</a></li>
							<li><a href="{{ route('registry') }}">Hediye Listem</a></li>
							<li><a href="{{ route('website_manage') }}">Websitem</a></li>
							<li><a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 2]) }}">Websiteleri</a></li>
							<li><a href="{{ route('product.category',['taxonomyName' => 'urunler','taxon' => 3]) }}">Davetiyeler</a></li>
							@endguest



						</ul>
					</div>
				</div>
			</div>
			<div class="headerbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<a href="{{route('welcome')}}"><img src="{{ asset('img/logo.png') }}" class="header-logo"/></a>
						</div>
						<div class="col-md-6 d-flex justify-content-center">
							<input type="text" class="search-input form-control" placeholder="Ürün arayın..."/>
						</div>
						<div class="col-md-3 d-flex justify-content-between">
							@guest
							<a href="{{route('register')}}" class="register-btn">Ücretsiz Kayıt</a>
							<a href="#" class="header-link login-link"  data-toggle="modal" data-target="#loginModal">
								<i class="flaticon-user"></i>
								<br/>
								Giriş Yap
							</a>
							@else


							<a class="header-link" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
											 <i class="flaticon-user"></i>
			 								<br/>
			 								Çıkış Yap
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
							@endguest

							<a href="{{route('cart.show')}}" class="header-link">
								<i class="flaticon-supermarket"></i>
								<br/>
								Sepetim
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="menubar">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav">
						@foreach(CategoryHelper::get() as $taxonomy)
							@include('product.index._category_level', ['taxons' => $taxonomy->rootLevelTaxons()])
						@endforeach
						</ul>
					</div>
				</nav>
			</div>
		</section>
		@yield('content')
		<section class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="logo">
							<img src="{{ asset('img/logo.png') }}" style="width:70%"/>
							<span>
								Online Tasarım Deneyimli Alışveriş Platformu
							</span>
						</div>
						<ul class="social-links">
							<li>
								<a href="https://facebook.com/dugunhediyemnet">
									<i class="flaticon-facebook"></i>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/dugunhediyemnet">
									<i class="flaticon-twitter"></i>
								</a>
							</li>
							<li>
								<a href="https://instagram.com/dugunhediyemnet">
									<i class="flaticon-instagram"></i>
								</a>
							</li>
						</ul>
						<div class="footer-menu">
							<span>© 2020 Düğün Hediyem Tüm hakları saklıdır.</span>
							<ul>
								<li><a href="#">Kişisel Verilerin Korunması</a></li>
								<li><a href="#">Gizlilik Politikası</a></li>
								<li><a href="#">Kullanım Koşullarımız</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row">

							<div class="col-md-6 menu">
								<h3>Yardım</h3>
								<ul>
									<li><a href="/hakkimizda">Hakkımızda</a></li>
									<li><a href="/nedir">Nedir</a></li>
									<li><a href="/nasil-calisir">Nasıl Çalışır?</a></li>
									<li><a href="/sss">Sıkça Sorulan Sorular</a></li>
									<li><a href="mailto:info@dugunhediyem.net">info@dugunhediyem.net</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">

						<div class="row">
							<div class="col-md-12 menu">
								<h3>Sözleşmeler</h3>
								<ul>
									<li><a href="/kisisel-verilerin-korunmasi-aydinlatma-metni">Kişisel Verilerin Korunması Aydınlatma Metni</a></li>
									<li><a href="/kullanim-sartlari">Kullanım Şartları ve İnternet Sitesi Üyelik Sözleşmesi</a></li>
									<li><a href="/veri-isleme">KVKK Veri İşleme Politikamız</a></li>
									<li><a href="/mesafeli-satis-sozlesmesi">Mesafeli Satış Sözleşmesi</a></li>
									<li><a href="/on-bilgilendirme-formu">Ön Bilgilendirme Formu</a></li>
									<li><a href="/gizlilik-politikasi">Temel Gizlilik Politikası</a></li>
								</ul>
							</div>
							<div class="col-md-6 store-link">
								<a href="#">
									<img src="{{ asset('img/google-play.png') }}" />
								</a>
							</div>
							<div class="col-md-6 store-link">
								<a href="#">
									<img src="{{ asset('img/appstore.png') }}" />
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<a href="javascript:void(0);" class="close" data-dismiss="modal" aria-label="Close">
							<i class="flaticon-close"></i>
						</a>
						<div class="login-row">

							<div class="login-bg"></div>
							<div class="login-form">

								<img src="{{ asset('img/logo.png') }}" class="login-logo"/>
								<h1 class="login-title">Hoşgeldiniz!</h1>
								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="row">
										<div class="col-md-12">
											<div class="form-group input-group">
												<input id="email" placeholder="E-Posta Adresi" type="email" class="login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
												@if ($errors->has('email'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group input-group">
												<input id="password" placeholder="Şifre" type="password" class="login-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

												@if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
											</div>
										</div>
										<div class="col-md-12 d-flex justify-content-between login-links">

											<div class="form-check d-flex">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
													{{ __('Beni Hatırla') }}
												</label>
											</div>
											<a href="{{ route('password.request') }}" class="forgot-password">Şifremi Unuttum</a>
										</div>
										<div class="col-md-12">
											<button type="submit" class="login-btn">GİRİŞ YAP</a>
										</div>
										<div class="col-md-12 register-links">
											<span>Hesabınız yok mu?</span> <a href="{{route('register')}}">Şimdi kayıt ol!</a>
										</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="csrf_token" value="{{ csrf_token() }}"/>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/connector.js') }}"></script>
		<script src="{{ asset('js/parsley.min.js') }}"></script>
		<script src="{{asset('js/mustache.min.js')}}"></script>
		<script src="{{ asset('js/script.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
				if(window.location.href.indexOf('#login') != -1){
					setTimeout(function(){
						$('.login-link').click();
					},300);
				}
				$('.login-form form').submit(function(e){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': "{{ csrf_token() }}"
						}
					});

					e.preventDefault();
					var email = $("input[name='email']").val();
					var password = $("input[name='password']").val();

					$.ajax({
						url: '{{ route("login") }}',
						type: 'POST',
						data: {
							email: email,
							password: password
						},
						success: function(data) {
							if(data.error){
								alert('Lütfen giriş bilgilerinizi kontrol ediniz.');
							}else{
								window.location.href="/";
							}
						}
					});
				})
			});
		</script>
		@yield('scripts')
	</body>
</html>
