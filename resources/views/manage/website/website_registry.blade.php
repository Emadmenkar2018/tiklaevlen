@extends('layouts.main')
@section('styles')
	<link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/website-edit.css') }}">
	<style>
		.menubar{
			display: none;
		}
	</style>
@endsection
@section('content')
<section class="page-edit">
	<div class="container">
		<ul class="website-edit-menu">
			<li><a href="{{route('website_home_update')}}">Anasayfa</a></li>
			<li><a href="{{route('website_schedule_update')}}">Etkinlikler</a></li>
			<li><a href="{{ route('website_registry_update') }}" class="active">Hediye Listesi</a></li>
			<li><a href="{{route('website_photos_update')}}">Fotoğraflar</a></li>
		</ul>
	</div>
	<div class="container" style="max-width:100%;">
		<div class="row edit-form">
			<div class="col-md-5">
				<h3 class="module-title">Hediye Listesi</h3>
				<p class="module-desc">
					Düğün sitenize hediye listenizi ekleyerek misafirlerinizin alışverişinize katkıda bulunmasını sağlayabilirsiniz. Dilerseniz buradan görünürlüğü gizleyebilirsiniz.
				</p>


				<section class="themes">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									@if(!$products->isEmpty())
										@foreach($products as $product)
											@include('registry.index._product2')
										@endforeach

									@else
									<p class="module-desc">
										Henüz hediye listenizi oluşturmadınız. <a href="{{ route('registry') }}">Buradan</a> başlayabilirsiniz.
									</p>
									@endif
								</div>
								@if(!$products->isEmpty())
									<a href="{{ route('registry') }}" class="preview-btn">Hediye Listemi Düzenle</a>
								@endif
							</div>

						</div>
					</div>
				</section>
			</div>
			<div class="col-md-7">
				<iframe src="{{route('preview_website',['slug' => $website->id,'module' => 'schedule'])}}" id="preview_website" style="width:100%;height:100vh;border:0;border-radius:10px;"></iframe>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')

@endsection
