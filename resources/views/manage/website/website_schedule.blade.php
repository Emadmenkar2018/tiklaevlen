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
			<li><a href="{{route('website_schedule_update')}}"  class="active">Etkinlikler</a></li>
			<li><a href="{{ route('website_registry_update') }}">Hediye Listesi</a></li>
			<li><a href="{{route('website_photos_update')}}">Fotoğraflar</a></li>
		</ul>
	</div>
	<div class="container" style="max-width:100%;">
		<div class="row edit-form">
			<div class="col-md-5">
				<h3 class="module-title">Etkinlikler</h3>
				<p class="module-desc">
					Kına gecesi, düğün yemeği, tekne gezisi gibi etkinlikleri ekleyerek misafirlerinize duyurabilirsiniz.
				</p>
				<div class="accordion" id="myAccordion">
					<div class="card" style="display:none;">
						<div class="card-header" id="headingOne">
							<a href="#" data-toggle="collapse" data-target="#collapseOne">Page Header</a><i class="flaticon-plus icon"></i>
						</div>
						<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#myAccordion">
							<div class="card-body">
								<form class="page_header_form">
									<div class="row">
										<div class="form-group col-md-12">
											<label for="email">Title *</label>
											<input type="text" class="form-control page_header_title" value="{{isset($module['page_title']) ? ($module['page_title']):("")}}" data-parsley-required>
										</div>
										<div class="form-group col-md-12">
											<label for="email">Description</label>
											<textarea class="form-control page_header_description">{{isset($module['page_description']) ? ($module['page_description']):("")}}</textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-primary wedding_summary_save">Kaydet</button>
								</form>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header" id="headingTwo">
							<a href="#" data-toggle="collapse" data-target="#collapseTwo">Etkinlikler</a><i class="flaticon-plus icon"></i>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#myAccordion">
							<div class="card-body">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-schedule">Etkinlik Ekle</button>
								<div class="row mt-3 website_schedules">
									@foreach($schedules as $schedule)
										<div class="col-md-12"></div>
										<div class="col-md-12 schedule_{{$schedule->id}}">
											<h4>{{$schedule->event_name}}</h4>
											<a href="javscript:void(0);" class="update-schedule-button" data-toggle="modal" data-target="#update-schedule" data-schedule='{{$schedule}}'>Düzenle</a><br/><a href="javascript:void(0);" class="delete-schedule" data-schedule="{{$schedule->id}}">Sil</a>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<iframe src="{{route('preview_website',['slug' => $website->id,'module' => 'schedule'])}}" id="preview_website" style="width:100%;height:100vh;border:0;border-radius:10px;"></iframe>
			</div>
		</div>
	</div>
</section>



<div class="modal fade" id="add-schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Etkinlik Ekle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="add-schedule-form">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="email">Tür *</label>
							<select class="form-control schedule_form_type" data-parsley-required>
								<option></option>
								<option value="1">Düğün</option>
								<option value="2">Nikah</option>
								<option value="3">Kına Gecesi</option>
								<option value="4">Düğün Yemeği</option>
								<option value="5">Kokteyl</option>
								<option value="6">Tekne Gezisi</option>
								<option value="7">Düğün Sonrası</option>
							</select>
						</div>
						<div class="form-group col-md-8">
							<label for="email">Etkinlik İsmi *</label>
							<input type="text" class="form-control schedule_form_event_name" data-parsley-required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="email">Tarih *</label>
							<input type="text" class="form-control schedule_form_date" data-parsley-required>
						</div>
						<div class="form-group col-md-3">
							<label for="email">Başlangıç Saati *</label>
							<select class="form-control schedule_form_start_time" data-parsley-required>
								<option></option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>1:00</option>
								<option>1:15</option>
								<option>1:30</option>
								<option>1:45</option>
								<option>2:00</option>
								<option>2:15</option>
								<option>2:30</option>
								<option>2:45</option>
								<option>3:00</option>
								<option>3:15</option>
								<option>3:30</option>
								<option>3:45</option>
								<option>4:00</option>
								<option>4:15</option>
								<option>4:30</option>
								<option>4:45</option>
								<option>5:00</option>
								<option>5:15</option>
								<option>5:30</option>
								<option>5:45</option>
								<option>6:00</option>
								<option>6:15</option>
								<option>6:30</option>
								<option>6:45</option>
								<option>7:00</option>
								<option>7:15</option>
								<option>7:30</option>
								<option>7:45</option>
								<option>8:00</option>
								<option>8:15</option>
								<option>8:30</option>
								<option>8:45</option>
								<option>9:00</option>
								<option>9:15</option>
								<option>9:30</option>
								<option>9:45</option>
								<option>10:00</option>
								<option>10:15</option>
								<option>10:30</option>
								<option>10:45</option>
								<option>11:00</option>
								<option>11:15</option>
								<option>11:30</option>
								<option>11:45</option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>13:00</option>
								<option>13:15</option>
								<option>13:30</option>
								<option>13:45</option>
								<option>14:00</option>
								<option>14:15</option>
								<option>14:30</option>
								<option>14:45</option>
								<option>15:00</option>
								<option>15:15</option>
								<option>15:30</option>
								<option>15:45</option>
								<option>16:00</option>
								<option>16:15</option>
								<option>16:30</option>
								<option>16:45</option>
								<option>17:00</option>
								<option>17:15</option>
								<option>17:30</option>
								<option>18:45</option>
								<option>18:00</option>
								<option>18:15</option>
								<option>18:30</option>
								<option>18:45</option>
								<option>19:00</option>
								<option>19:15</option>
								<option>19:30</option>
								<option>19:45</option>
								<option>20:00</option>
								<option>20:15</option>
								<option>20:30</option>
								<option>20:45</option>
								<option>21:00</option>
								<option>21:15</option>
								<option>21:30</option>
								<option>21:45</option>
								<option>22:00</option>
								<option>22:15</option>
								<option>22:30</option>
								<option>22:45</option>
								<option>23:00</option>
								<option>23:15</option>
								<option>23:30</option>
								<option>23:45</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="email">Bitiş Saati</label>
							<select class="form-control schedule_form_end_time">
								<option></option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>1:00</option>
								<option>1:15</option>
								<option>1:30</option>
								<option>1:45</option>
								<option>2:00</option>
								<option>2:15</option>
								<option>2:30</option>
								<option>2:45</option>
								<option>3:00</option>
								<option>3:15</option>
								<option>3:30</option>
								<option>3:45</option>
								<option>4:00</option>
								<option>4:15</option>
								<option>4:30</option>
								<option>4:45</option>
								<option>5:00</option>
								<option>5:15</option>
								<option>5:30</option>
								<option>5:45</option>
								<option>6:00</option>
								<option>6:15</option>
								<option>6:30</option>
								<option>6:45</option>
								<option>7:00</option>
								<option>7:15</option>
								<option>7:30</option>
								<option>7:45</option>
								<option>8:00</option>
								<option>8:15</option>
								<option>8:30</option>
								<option>8:45</option>
								<option>9:00</option>
								<option>9:15</option>
								<option>9:30</option>
								<option>9:45</option>
								<option>10:00</option>
								<option>10:15</option>
								<option>10:30</option>
								<option>10:45</option>
								<option>11:00</option>
								<option>11:15</option>
								<option>11:30</option>
								<option>11:45</option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>13:00</option>
								<option>13:15</option>
								<option>13:30</option>
								<option>13:45</option>
								<option>14:00</option>
								<option>14:15</option>
								<option>14:30</option>
								<option>14:45</option>
								<option>15:00</option>
								<option>15:15</option>
								<option>15:30</option>
								<option>15:45</option>
								<option>16:00</option>
								<option>16:15</option>
								<option>16:30</option>
								<option>16:45</option>
								<option>17:00</option>
								<option>17:15</option>
								<option>17:30</option>
								<option>18:45</option>
								<option>18:00</option>
								<option>18:15</option>
								<option>18:30</option>
								<option>18:45</option>
								<option>19:00</option>
								<option>19:15</option>
								<option>19:30</option>
								<option>19:45</option>
								<option>20:00</option>
								<option>20:15</option>
								<option>20:30</option>
								<option>20:45</option>
								<option>21:00</option>
								<option>21:15</option>
								<option>21:30</option>
								<option>21:45</option>
								<option>22:00</option>
								<option>22:15</option>
								<option>22:30</option>
								<option>22:45</option>
								<option>23:00</option>
								<option>23:15</option>
								<option>23:30</option>
								<option>23:45</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="email">Mekan İsmi</label>
							<input type="text" class="form-control schedule_form_venue_name">
						</div>
						<div class="form-group col-md-12">
							<label for="email">Açık Adres</label>
							<input type="text" class="form-control schedule_form_street_address">
						</div>
						<div class="form-group col-md-6">
							<label for="email">İl</label>
							<select class="form-control schedule_form_il">
								<option></option>
								@foreach($iller as $il)
									<option value="{{$il->il_no}}">{{$il->isim}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="email">İlçe</label>
							<select class="form-control schedule_form_ilce">
								<option></option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label for="email">Açıklama</label>
							<textarea class="form-control schedule_form_description"></textarea>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Ekle</button>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="update-schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Etkinlik Güncelle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="update-schedule-form">
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-4">
							<label for="email">Tür *</label>
							<select class="form-control schedule_form_type" data-parsley-required>
								<option></option>
								<option value="1">Düğün</option>
								<option value="2">Nikah</option>
								<option value="3">Kına Gecesi</option>
								<option value="4">Düğün Yemeği</option>
								<option value="5">Kokteyl</option>
								<option value="6">Tekne Gezisi</option>
								<option value="7">Düğün Sonrası</option>
							</select>
						</div>
						<div class="form-group col-md-8">
							<label for="email">Etkinlik İsmi *</label>
							<input type="text" class="form-control schedule_form_event_name" data-parsley-required>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="email">Tarih *</label>
							<input type="text" class="form-control schedule_form_date" data-parsley-required>
						</div>
						<div class="form-group col-md-3">
							<label for="email">Başlangıç Saati *</label>
							<select class="form-control schedule_form_start_time" data-parsley-required>
								<option></option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>1:00</option>
								<option>1:15</option>
								<option>1:30</option>
								<option>1:45</option>
								<option>2:00</option>
								<option>2:15</option>
								<option>2:30</option>
								<option>2:45</option>
								<option>3:00</option>
								<option>3:15</option>
								<option>3:30</option>
								<option>3:45</option>
								<option>4:00</option>
								<option>4:15</option>
								<option>4:30</option>
								<option>4:45</option>
								<option>5:00</option>
								<option>5:15</option>
								<option>5:30</option>
								<option>5:45</option>
								<option>6:00</option>
								<option>6:15</option>
								<option>6:30</option>
								<option>6:45</option>
								<option>7:00</option>
								<option>7:15</option>
								<option>7:30</option>
								<option>7:45</option>
								<option>8:00</option>
								<option>8:15</option>
								<option>8:30</option>
								<option>8:45</option>
								<option>9:00</option>
								<option>9:15</option>
								<option>9:30</option>
								<option>9:45</option>
								<option>10:00</option>
								<option>10:15</option>
								<option>10:30</option>
								<option>10:45</option>
								<option>11:00</option>
								<option>11:15</option>
								<option>11:30</option>
								<option>11:45</option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>13:00</option>
								<option>13:15</option>
								<option>13:30</option>
								<option>13:45</option>
								<option>14:00</option>
								<option>14:15</option>
								<option>14:30</option>
								<option>14:45</option>
								<option>15:00</option>
								<option>15:15</option>
								<option>15:30</option>
								<option>15:45</option>
								<option>16:00</option>
								<option>16:15</option>
								<option>16:30</option>
								<option>16:45</option>
								<option>17:00</option>
								<option>17:15</option>
								<option>17:30</option>
								<option>18:45</option>
								<option>18:00</option>
								<option>18:15</option>
								<option>18:30</option>
								<option>18:45</option>
								<option>19:00</option>
								<option>19:15</option>
								<option>19:30</option>
								<option>19:45</option>
								<option>20:00</option>
								<option>20:15</option>
								<option>20:30</option>
								<option>20:45</option>
								<option>21:00</option>
								<option>21:15</option>
								<option>21:30</option>
								<option>21:45</option>
								<option>22:00</option>
								<option>22:15</option>
								<option>22:30</option>
								<option>22:45</option>
								<option>23:00</option>
								<option>23:15</option>
								<option>23:30</option>
								<option>23:45</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="email">Bitiş Saati</label>
							<select class="form-control schedule_form_end_time">
								<option></option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>1:00</option>
								<option>1:15</option>
								<option>1:30</option>
								<option>1:45</option>
								<option>2:00</option>
								<option>2:15</option>
								<option>2:30</option>
								<option>2:45</option>
								<option>3:00</option>
								<option>3:15</option>
								<option>3:30</option>
								<option>3:45</option>
								<option>4:00</option>
								<option>4:15</option>
								<option>4:30</option>
								<option>4:45</option>
								<option>5:00</option>
								<option>5:15</option>
								<option>5:30</option>
								<option>5:45</option>
								<option>6:00</option>
								<option>6:15</option>
								<option>6:30</option>
								<option>6:45</option>
								<option>7:00</option>
								<option>7:15</option>
								<option>7:30</option>
								<option>7:45</option>
								<option>8:00</option>
								<option>8:15</option>
								<option>8:30</option>
								<option>8:45</option>
								<option>9:00</option>
								<option>9:15</option>
								<option>9:30</option>
								<option>9:45</option>
								<option>10:00</option>
								<option>10:15</option>
								<option>10:30</option>
								<option>10:45</option>
								<option>11:00</option>
								<option>11:15</option>
								<option>11:30</option>
								<option>11:45</option>
								<option>12:00</option>
								<option>12:15</option>
								<option>12:30</option>
								<option>12:45</option>
								<option>13:00</option>
								<option>13:15</option>
								<option>13:30</option>
								<option>13:45</option>
								<option>14:00</option>
								<option>14:15</option>
								<option>14:30</option>
								<option>14:45</option>
								<option>15:00</option>
								<option>15:15</option>
								<option>15:30</option>
								<option>15:45</option>
								<option>16:00</option>
								<option>16:15</option>
								<option>16:30</option>
								<option>16:45</option>
								<option>17:00</option>
								<option>17:15</option>
								<option>17:30</option>
								<option>18:45</option>
								<option>18:00</option>
								<option>18:15</option>
								<option>18:30</option>
								<option>18:45</option>
								<option>19:00</option>
								<option>19:15</option>
								<option>19:30</option>
								<option>19:45</option>
								<option>20:00</option>
								<option>20:15</option>
								<option>20:30</option>
								<option>20:45</option>
								<option>21:00</option>
								<option>21:15</option>
								<option>21:30</option>
								<option>21:45</option>
								<option>22:00</option>
								<option>22:15</option>
								<option>22:30</option>
								<option>22:45</option>
								<option>23:00</option>
								<option>23:15</option>
								<option>23:30</option>
								<option>23:45</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="email">Mekan Saati</label>
							<input type="text" class="form-control schedule_form_venue_name">
						</div>
						<div class="form-group col-md-12">
							<label for="email">Açık Adres</label>
							<input type="text" class="form-control schedule_form_street_address">
						</div>
						<div class="form-group col-md-6">
							<label for="email">İl</label>
							<select class="form-control schedule_form_il">
								<option></option>
								@foreach($iller as $il)
									<option value="{{$il->il_no}}">{{$il->isim}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="email">İlçe</label>
							<select class="form-control schedule_form_ilce">
								<option></option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label for="email">Açıklama</label>
							<textarea class="form-control schedule_form_description"></textarea>
						</div>

						<input type="hidden" class="schedule_form_id" />
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Güncelle</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{asset('js/bootstrap-datepicker.tr.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$('.page_header_form').parsley();
		$('.add-schedule-form').parsley();
		$('.update-schedule-form').parsley();
		$('.schedule_form_date').datepicker({
			language:"tr"
		});
		$('.page_header_form').on('submit',function(e){
			e.preventDefault();
			var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()){
				var formData = new FormData();
				formData.append('page_title',$('.page_header_title').val());
				formData.append('page_description',$('.page_header_description').val());
				connector.ajaxFormData({
					type:"POST",
					url:"{{route('website_schedule_update_post')}}",
					headers:{
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data:formData
				},function(result){
					alert('Sayfa güncellendi');
					var f = document.getElementById('preview_website');
					f.src = f.src;
				});

			}
		});

		$('.update-schedule-form').on('submit',function(e){
			e.preventDefault();
			var form = $(this);
            form.parsley().validate();
			if (form.parsley().isValid()){
				var formData = new FormData();

				formData.append('event_type',$('#update-schedule .schedule_form_type').val());
				formData.append('event_name',$('#update-schedule .schedule_form_event_name').val());
				formData.append('event_date',$('#update-schedule .schedule_form_date').val());
				formData.append('event_start_time',$('#update-schedule .schedule_form_start_time option:selected').html());
				formData.append('event_end_time',$('#update-schedule .schedule_form_end_time option:selected').html());
				formData.append('event_location',JSON.stringify({
					venue_name:$('#update-schedule .schedule_form_venue_name').val(),
					street_address:$('#update-schedule .schedule_form_street_address').val(),
					apt_floor:$('#update-schedule .schedule_form_apt_floor').val(),
					il:$('#update-schedule .schedule_form_il option:selected').attr('value'),
					ilce:$('#update-schedule .schedule_form_ilce option:selected').attr('value')
				}));
				formData.append('event_description',$('#update-schedule .schedule_form_description').val());
				formData.append('schedule_id',$('#update-schedule .schedule_form_id').val());
				connector.ajaxFormData({
					type:"POST",
					url:"{{route('update_schedule_event')}}",
					headers:{
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data:formData
				},function(result){
					alert('Sayfa güncellendi.');
					$('.website_schedules').html('');
					$.each(result.schedules,function(index,schedule){
						$.get('{{url("/html_tpl/schedule_line.html")}}',function(html){
							schedule.fulldata = JSON.stringify(schedule);
							var output = Mustache.render(html, schedule);
							$('.website_schedules').append(output);
						});
					});
					var f = document.getElementById('preview_website');
					f.src = f.src;
				});
			}
		});

		$('.add-schedule-form').on('submit',function(e){
			e.preventDefault();
			var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()){
				var formData = new FormData();
				formData.append('event_type',$('.schedule_form_type').val());
				formData.append('event_name',$('.schedule_form_event_name').val());
				formData.append('event_date',$('.schedule_form_date').val());
				formData.append('event_start_time',$('.schedule_form_start_time option:selected').html());
				formData.append('event_end_time',$('.schedule_form_end_time option:selected').html());
				formData.append('event_location',JSON.stringify({
					venue_name:$('.schedule_form_venue_name').val(),
					street_address:$('.schedule_form_street_address').val(),
					apt_floor:$('.schedule_form_apt_floor').val(),
					il:$('.schedule_form_il option:selected').attr('value'),
					ilce:$('.schedule_form_ilce option:selected').attr('value')
				}));
				formData.append('event_description',$('.schedule_form_description').val());

				connector.ajaxFormData({
					type:"POST",
					url:"{{route('add_schedule_event')}}",
					headers:{
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data:formData
				},function(result){
					alert('Sayfa güncellendi.');
					$('.website_schedules').html('');
					$.each(result.schedules,function(index,schedule){
						$.get('{{url("/html_tpl/schedule_line.html")}}',function(html){
							schedule.fulldata = JSON.stringify(schedule);
							var output = Mustache.render(html, schedule);
							$('.website_schedules').append(output);
						});
					});
					var f = document.getElementById('preview_website');
					f.src = f.src;

				});

			}
		});

		$('.schedule_form_il').change(function(){
			var il = $('.schedule_form_il option:selected').attr('value');
			connector.ajax({
				type:"POST",
				url:"{{route('ilceler')}}",
				data:{
					id:il,
					_token:"{{ csrf_token() }}"
				}
			},function(result){
				$('.schedule_form_ilce').html('');
				$.each(result,function(index,ilce){
					$('.schedule_form_ilce').append("<option value='"+ilce.ilce_no+"'>" + ilce.isim + "</option>");
				});
			});
		});
		$(document).on('click','.delete-schedule',function(){
			var id = $(this).data('schedule');
			connector.ajax({
				type:"POST",
				url:"{{route('delete_schedule_event')}}",
				data:{
					schedule_id: id,
					_token: "{{ csrf_token() }}"
				}
			},function(result){
				$('.schedule_' + id).remove();

				var f = document.getElementById('preview_website');
				f.src = f.src;

			})

		})
		$(document).on('click','.update-schedule-button',function(){
			var schedule = $(this).data('schedule');
			$('#update-schedule .schedule_form_type').val(schedule.event_type);
			$('#update-schedule .schedule_form_event_name').val(schedule.event_name);
			$('#update-schedule .schedule_form_date').val(schedule.date);
			$.each($('#update-schedule .schedule_form_start_time option'),function(index,value){
				if($(value).html() == schedule.start_time)
				{
					$(value).attr('selected',true);
				}
			});
			$.each($('#update-schedule .schedule_form_end_time option'),function(index,value){
				if($(value).html() == schedule.end_time)
				{
					$(value).attr('selected',true);
				}
			});

			$('#update-schedule .schedule_form_id').val(schedule.id);
			$('#update-schedule .schedule_form_venue_name').val(schedule.event_location.venue_name);
			$('#update-schedule .schedule_form_apt_floor').val(schedule.event_location.apt_floor);
			$('#update-schedule .schedule_form_street_address').val(schedule.event_location.street_address);
			$('#update-schedule .schedule_form_il').val(schedule.event_location.il);

			connector.ajax({
				type:"POST",
				url:"{{route('ilceler')}}",
				data:{
					id:schedule.event_location.il,
					_token:"{{ csrf_token() }}"
				}
			},function(result){
				$('#update-schedule .schedule_form_ilce').html('');
				$.each(result,function(index,ilce){
					if(ilce.ilce_no == schedule.event_location.ilce){
						$('#update-schedule .schedule_form_ilce').append("<option value='"+ilce.ilce_no+"' selected>" + ilce.isim + "</option>");
					}else{
						$('#update-schedule .schedule_form_ilce').append("<option value='"+ilce.ilce_no+"'>" + ilce.isim + "</option>");
					}
				});
			});

			$('#update-schedule .schedule_form_description').val(schedule.description);


		})

	});
</script>
@endsection
