@extends('layouts.main')
@section('styles')
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
			<li><a href="{{route('website_home_update')}}" >Anasayfa</a></li>
			<li><a href="{{route('website_schedule_update')}}" >Etkinlikler</a></li>
			<li><a  href="{{ route('website_registry_update') }}">Hediye Listesi</a></li>
			<li><a href="{{route('website_photos_update')}}" class="active">Fotoğraflar</a></li>
		</ul>
	</div>
	<div class="container" style="max-width:100%;">
		<div class="row edit-form">
			<div class="col-md-5">
				<form class="photos_form" enctype="multipart/form-data">

					<div class="form-group col-md-12">
						<h3 class="module-title">Fotoğraflar</h3>
						<p class="module-desc">
							Düğün sitenizde davetlilerinizle en mutlu anlarınızı paylaşabilirsiniz. Tek seçimle birden fazla fotoğraf ekleyebilirsiniz.
						</p>
						<label for="email">Fotoğraflar *</label>
						<input type="file" name="photos[]" class="form-control photos" multiple>
					</div>
					<button type="submit" class="btn btn-primary" id="upload">Kaydet</button>
				</form>
			</div>
			<div class="col-md-7">
				<div class="row website_photos">
				@foreach($photos as $photo)
					<div class="col-md-6 photo_{{$photo->id}}">
						<img src="{{url($photo->path)}}" style="width:100%;"/>
						<a href="javascript:void(0);" data-photo="{{$photo->id}}" class="delete-photo">Sil</a>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$('body').on('click', '#upload', function(e){
	        e.preventDefault();
	        var formData = new FormData($(this).parents('form')[0]);
			connector.ajaxFormData({
				type:"POST",
				url:"{{route('website_photos_update_post')}}",
				headers:{
					'X-CSRF-TOKEN': "{{ csrf_token() }}"
				},
				data:formData
			},function(result){
				$('.website_photos').html('');
				$.each(result.photos,function(index,photo){
					$.get('{{url("/html_tpl/photo_line.html")}}',function(html){
						var output = Mustache.render(html, photo);
						$('.website_photos').append(output);
					});
				});
			});
		});

		$('body').on('click','.delete-photo',function(){
			var photo = $(this).data('photo');
			connector.ajax({
				type:"POST",
				url:"{{route('delete_website_photo')}}",
				data:{
					id: photo,
					_token: "{{csrf_token()}}"
				}
			},function(result){
				$('.photo_' + photo).remove();
			})
		});
	})
</script>
@endsection
