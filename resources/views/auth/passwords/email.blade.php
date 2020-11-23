@extends('layouts.main')

@section('content')
<div class="container" style="margin-top:50px;margin-bottom:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<form method="POST" action="{{ route('password.email') }}">
				@csrf
				<label for="email" class="col-md-12 col-form-label text-center login-title">Şifremi Unuttum</label>
				<label class="login-subtitle">Yeni şifre belirlemek için kayıtlı e-posta adresinizi yazınız.Şifre değiştirme linkini e-posta adresinize göndereceğiz.</label>
				<div class="form-group row d-flex justify-content-center">
					<div class="col-md-6">
						<input id="email" type="email" placeholder="E-posta Adresi" class="login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group row mb-0 d-flex justify-content-center">
					<div class="col-md-6">
						<button type="submit" class="login-btn">GÖNDER</a>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
@endsection
