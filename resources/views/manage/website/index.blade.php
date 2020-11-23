@extends('layouts.main')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/website-edit.css') }}">
	<style>
		.menubar{
			display: none;
		}
	</style>
@endsection
@section('scripts')
	<script>
		$(document).ready(function(){
			$('.module-radio').change(function(){
				connector.ajax({
					type:"POST",
					url:"/update_website_active_modules",
					data:{
						module:$(this).data('module'),
						value:$(this).val(),
						_token:$('#csrf_token').val(),
						website:$('#website_id').val()
					}
				},function(result){
					console.log(result);
				})
			});
		});

	</script>
@endsection

@section('content')

	<section class="website-edit">
		<div class="edit-header">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="left">
						<div class="ring-round">
							<i class="flaticon-wedding-ring"></i>
						</div>
						<h2>
							{{Auth::user()->name}} & {{Auth::user()->husband_name}} Websitesi
						</h2>
					</div>
					<div class="right">
						<a class="publish-btn" target="_blank" href="{{route('preview_website',['slug' =>$website->id,'module' => 'home'])}}">
							<i class="flaticon-eye"></i>Websitesini göster
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="edit-info" style="display:none;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 info-box">
						<div>
						<h4 class="info-title"><i class="flaticon-setting"></i>WEBSİTE URL</h4>
						<span class="info-url">www.tiklaevlen.com/sinanesra</span>
						<div class="info-url-preview">
							<span>sinanesra</span><a href="#"><i class="flaticon-edit"></i>Düzenle</a>
						</div>
						</div>
					</div>
					<div class="col-md-4 info-box">
						<div>
							<h4 class="info-title"><i class="flaticon-setting"></i>WEBSİTESİ AYARLARI</h4>
							<div class="d-flex">
								<span class="info-url">Şifre Oluştur</span>
								<label class="switch" style="margin-left:20px;">
									<input type="checkbox">
									<span class="slider round"></span>
								</label>
							</div>
							<div class="info-url-preview">
								<a href="#" style="margin-left:0;">Gizlilik Ayarları</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 info-box noborder">
						<div>
							<h4 class="info-title"><i class="flaticon-edit"></i>TEMAYI DÜZENLE</h4>
							<span class="info-url">www.tiklaevlen.com/sinanesra</span>
							<div class="info-url-preview">
								<span>sinanesra</span><a href="#"><i class="flaticon-edit"></i>Düzenle</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="page-list">
		<div class="container">
			@if($website == null)
				lütfen tasarım satın alınız.
			@else

				<h2 class="title">Sayfalar</h2>
				<div class="row">
					<div class="col-md-12 page-row">
						<div class="row">
							<div class="col">
								<div class="d-flex align-items-center">
									<div class="icon">
										<i class="flaticon-homepage"></i>
									</div>
									<a href="{{route('website_home_update')}}"><h3 class="page-title">Anasayfa</h3></a>
								</div>
							</div>
							<div class="col d-flex justify-content-center">
								<label>Sabit Sayfa</label>
							</div>
							<div class="col">
								<a href="{{route('website_home_update')}}" class="btn btn-primary">Düzenle</a>
							</div>
						</div>
					</div>

					<div class="col-md-12 page-row">
						<div class="row">
							<div class="col">
								<div class="d-flex align-items-center">
									<div class="icon">
										<i class="flaticon-events"></i>
									</div>
									<a href="{{route('website_schedule_update')}}"><h3 class="page-title">Etkinlikler</h3></a>
								</div>
							</div>
							<div class="col d-flex justify-content-center">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-primary {{$website->active_modules['schedule'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="true" data-module="schedule" {{$website->active_modules['schedule'] ? ('active'):(null)}}"> Evet
									</label>
									<label class="btn btn-primary {{!$website->active_modules['schedule'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="false" data-module="schedule"  {{!$website->active_modules['schedule'] ? ('active'):(null)}}"> Hayır
									</label>
								</div>
							</div>
							<div class="col">
								<a href="{{route('website_schedule_update')}}" class="btn btn-primary">Düzenle</a>
							</div>
						</div>
					</div>

					<div class="col-md-12 page-row">
						<div class="row">
							<div class="col">
								<div class="d-flex align-items-center">
									<div class="icon">
										<i class="flaticon-registry"></i>
									</div>
									<a href="{{ route('website_registry_update') }}"><h3 class="page-title">Hediye Listesi</h3></a>
								</div>
							</div>
							<div class="col d-flex justify-content-center">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-primary {{$website->active_modules['registry'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="true" data-module="registry" {{$website->active_modules['registry'] ? ('active'):(null)}}"> Evet
									</label>
									<label class="btn btn-primary {{!$website->active_modules['registry'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="false" data-module="registry" {{!$website->active_modules['registry'] ? ('active'):(null)}}"> Hayır
									</label>
								</div>
							</div>
							<div class="col">
								<a href="{{ route('website_registry_update') }}" class="btn btn-primary">Düzenle</a>
							</div>
						</div>
					</div>

					<div class="col-md-12 page-row">
						<div class="row">
							<div class="col">
								<div class="d-flex align-items-center">
									<div class="icon">
										<i class="flaticon-photos"></i>
									</div>
									<a href="{{route('website_photos_update')}}"><h3 class="page-title">Fotoğraflar</h3></a>
								</div>
							</div>
							<div class="col d-flex justify-content-center">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-primary {{$website->active_modules['photos'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="true" data-module="photos" {{$website->active_modules['photos'] ? ('active'):(null)}}"> Evet
									</label>
									<label class="btn btn-primary {{!$website->active_modules['photos'] ? ('activee'):(null)}}">
										<input type="radio" name="options" class="module-radio" autocomplete="off" value="false" data-module="photos" {{!$website->active_modules['photos'] ? ('active'):(null)}}"> Hayır
									</label>
								</div>
							</div>
							<div class="col">
								<a href="{{route('website_photos_update')}}" class="btn btn-primary">Düzenle</a>
							</div>
						</div>
					</div>

				</div>
			@endif

		</div>
	</section>

	<input type="hidden" id="website_id" value="{{$website->id}}"/>
	<input type="hidden" value="{{csrf_token()}}" name="csrf_token" id="csrf_token"/>
@endsection
