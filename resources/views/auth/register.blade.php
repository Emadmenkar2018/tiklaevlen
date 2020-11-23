@extends('layouts.register')
@section('styles')
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')
<div class="register">
	<div class="container register-container">
		<div class="step name active" data-prev="">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<span class="step-title">Lütfen isminizi yazın!</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-5">
					<input type="text" class="form-control form_input f_name" placeholder="Adınız *">
				</div>
				<div class="form-group col-md-5">
					<input type="text" class="form-control form_input f_lastname" placeholder="Soyadınız *">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary next_name" data-next="husband_name">İlerle</button>
				</div>
			</div>
		</div>
		<div class="step husband_name" data-prev="name">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<span class="step-title">Peki eşinizin ismi</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-5">
					<input type="text" class="form-control form_input husband_f_name" placeholder="Adı *">
				</div>
				<div class="form-group col-md-5">
					<input type="text" class="form-control form_input husband_f_lastname" placeholder="Soyadı *">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary next_husband_name" data-prev="name" data-next="marriage_date">İlerle</button>
				</div>
			</div>
		</div>
		<div class="step marriage_date" data-prev="husband_name">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<span class="step-title"><span class="m_name"></span> ve <span class="h_name"></span>.. Birbirinize çok yakışıyorsunuz! Evlilik tarihinizi belirlediniz mi?</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-4">
					<select class="marriage_date_select_month form_input f_marriage_date_month" name="state">
						<option value="0">Ay</option>
  						<option value="1">Ocak</option>
						<option value="2">Şubat</option>
						<option value="3">Mart</option>
						<option value="4">Nisan</option>
						<option value="5">Mayıs</option>
						<option value="6">Haziran</option>
						<option value="7">Temmuz</option>
						<option value="8">Ağustos</option>
						<option value="9">Eylül</option>
						<option value="10">Ekim</option>
						<option value="11">Kasım</option>
						<option value="12">Aralık</option>

					</select>
				</div>
				<div class="form-group col-md-2">
					<select class="marriage_date_select_day form_input f_marriage_date_day" name="state">
						<option value="0">Gün</option>
						@for ($i = 1; $i <= 31; $i++)
    						<option value="{{$i}}">{{ $i }}</option>
						@endfor
					</select>
				</div>
				<div class="form-group col-md-4">
					<select class="marriage_date_select_year form_input f_marriage_date_year" name="state">
						<option value="0">Yıl</option>
						@for ($i = 2020; $i <= 2050; $i++)
    						<option value="{{$i}}">{{ $i }}</option>
						@endfor
					</select>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="form-check d-flex align-items-center">
					<input class="form-check-input f_decide" type="checkbox" name="remember" id="remember">

					<label class="form-check-label" for="remember">
						{{ __('Hala karar veriyoruz') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary marriage_date_btn" data-next="katilimci_step">İlerle</button>
				</div>
			</div>
		</div>

		<div class="step katilimci katilimci_step"  data-prev="marriage_date">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center" style="flex-direction:column;">
					<span class="step-title">Ne kadar katılımcı davet edeceksiniz?</span>
					<span class="step-subtitle">
						Ortalama bir sayı belirmeniz yeterli olur.(daha sonra değiştirebilirsiniz).<br/>Davetlilerinizin verecek bir hediyesi olmasını önemsiyoruz.
					</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-10">
					<input type="text" class="form-control form_input f_katilimci_sayisi" placeholder="Katılımcı Sayısı">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary katilim_step_btn" data-next="taki_step">İlerle</button>
				</div>
			</div>
		</div>
		<div class="step katilimci taki_step" data-prev="katilimci_step">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center" style="flex-direction:column;">
					<span class="step-title">Bir arkadaşınızın düğününde ne kadarlık takı takıyorsunuz veya hediye bütçeniz nedir?</span>
					<span class="step-subtitle">
						Bunu bir anket gibi değerlendirebilirsiniz. Sadece davetlilerinize neleri önereceğimizi bilmek istiyoruz.
					</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-7">
					<select class="f_taki form_input" name="state">
						<option value="0">Lütfen Seçiniz</option>
						<option value="1">50-100 TL</option>
						<option value="2">200 TL</option>
						<option value="3">300 TL veya Gram Altın</option>
						<option value="4">500 TL veya Çeyrek Altın</option>
						<option value="5">Cumhuriyet Altını veya Bilezik</option>
						<option value="6">Tam emin değilim</option>
					</select>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary taki_step_btn" data-next="last_step">İlerle</button>
				</div>
			</div>
		</div>
		<div class="step katilimci last_step" data-prev="taki_step">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center" style="flex-direction:column;">
					<span class="step-title">Az Kaldı!</span>
					<span class="step-subtitle">
						Seçeneklerinizi kaydedebilmemiz için kolayca üye olun.<br/>Zaten üyeyseniz lütfen giriş yapın
					</span>
				</div>
			</div>
			<div class="row step-form-row">
				<div class="form-group col-md-6">
					<input type="text" class="form-control form_input f_email" placeholder="E-Posta *">
				</div>
				<div class="form-group col-md-6">
					<input type="password" class="form-control form_input f_password" placeholder="Şifre *">
				</div>

			</div>
			<div class="row  d-flex justify-content-center">
				<div class="col-md-12 d-flex justify-content-center">
					<button type="submit" class="btn btn-primary register_btn">Devam Et</button>
				</div>
				<span class="step-bottom">Düğün Hediyem hesabınızı oluşturarak <a href="#">Kullanım Şartları</a> ve <a href="#">Gizlilik Politikamızı</a> kabul etmiş olursunuz.</span>
			</div>
		</div>
	</div>

	<div class="register-footer">
		<a href="javascript:void(0)" class="back-btn">Geri dön</a>
		<span class="onboard-footer__login">Hesabınız mı var?&nbsp;<a href="/#login">Giriş yapın</a></span>
	</div>
</div>

@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		var register_data = {};
	    $('.marriage_date_select_month').select2({
			minimumResultsForSearch: -1,
		});
		$('.marriage_date_select_day').select2({
			minimumResultsForSearch: -1,
		});
		$('.marriage_date_select_year').select2({
			minimumResultsForSearch: -1,
		});
		$('.f_taki').select2({
			minimumResultsForSearch: -1,
		});
		$('.back-btn').click(function(){

			var prev = $('.step.active').data('prev');
			if(prev != ""){
				$('.step').removeClass('active');
				$('.' + prev).addClass("active");
			}

		});
		function next(a){
			$('.step').removeClass('active');
			var next = $(a).data('next');
			$('.' + next).addClass("active");
		}
		$('.next_name').click(function(){
			if($('.f_name').val() == "" || $('.f_lastname').val() == ""){
				alert('Lütfen tüm alanları doldurunuz.');
			}else{
				register_data.name = $('.f_name').val();
				$('.m_name').html(register_data.name);
				register_data.lastname = $('.f_lastname').val();
				next($(this));
			}


		});
		$('.next_husband_name').click(function(){
			if($('.husband_f_name').val() == "" || $('.husband_f_lastname').val() == ""){
				alert('Lütfen tüm alanları doldurunuz.');
			}else{

				register_data.husband_name = $('.husband_f_name').val();
				$('.h_name').html(register_data.husband_name);
				register_data.husband_lastname = $('.husband_f_lastname').val();
				next($(this));
			}

		});
		$('.f_decide').change(function(){
			if($(this).is(':checked')){
				$('.f_marriage_date_month').val(0).trigger('change');
				$('.f_marriage_date_day').val(0).trigger('change');
				$('.f_marriage_date_year').val(0).trigger('change');
			}
		});
		$('.marriage_date_btn').click(function(){
			if(!$('.f_decide').is(':checked')){
				if($('.f_marriage_date_month').val() == 0 || $('.f_marriage_date_day').val() == 0 || $('.f_marriage_date_year').val() == 0){
					alert('Lütfen tüm alanları doldurunuz.');
				}else{
					register_data.marriage_date_month = $('.f_marriage_date_month').val();
					register_data.marriage_date_day = $('.f_marriage_date_day').val();
					register_data.marriage_date_year = $('.f_marriage_date_year').val();
					register_data.decide = false;
					next($(this));
				}
			}else{
				register_data.marriage_date_month = 0;
				register_data.marriage_date_day = 0;
				register_data.marriage_date_year = 0;
				register_data.decide = true;
				next($(this));
			}


		});
		$('.katilim_step_btn').click(function(){
			register_data.katilimci_sayisi = $('.f_katilimci_sayisi').val();
			next($(this));
		});
		$('.taki_step_btn').click(function(){
			register_data.taki = $('.f_taki').val();
			next($(this));
		});
		$('.register_btn').click(function(){
			if($('.f_email').val() == 0 || $('.f_password').val() == 0){
				alert('Lütfen tüm alanları doldurunuz.');
			}else{
				register_data.email = $('.f_email').val();
				register_data.password = $('.f_password').val();
				register_data._token = "{{csrf_token()}}";
				connector.ajax({
					type:"POST",
					url:"{{route('register2')}}",
					data:register_data
				},function(result){
					if(result.status == "success"){
						window.location.href = "/";
					}
				});
			}

		});
	});
</script>
@endsection
