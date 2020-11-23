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
			<li><a href="{{route('website_home_update')}}" class="active">Anasayfa</a></li>
			<li><a href="{{route('website_schedule_update')}}">Etkinlikler</a></li>
			<li><a href="{{ route('website_registry_update') }}">Hediye Listesi</a></li>
			<li><a href="{{route('website_photos_update')}}">Fotoğraflar</a></li>
		</ul>
	</div>
	<div class="container" style="max-width:100%;">
		<div class="row edit-form">
			<div class="col-md-5">
				<h3 class="module-title">Anasayfa</h3>
				<p class="module-desc">
					Bu sayfadan düğününüzün detaylarını, hoşgeldin mesajınızı, tanışma hikayelerinizi ekleyebilirsiniz. Sağ bölümden ise düğün sitenizin misafirlerinizin gözünden nasıl görüneceğini görürsünüz.
				</p>
				<div class="accordion" id="myAccordion">
				    <div class="card">
				        <div class="card-header" id="headingOne">
							<a href="#" data-toggle="collapse" data-target="#collapseOne">Düğün Detayları</a><i class="flaticon-plus icon"></i>
				        </div>
				        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#myAccordion">
				            <div class="card-body">
								<form class="wedding_summary_form">
									<div class="row">
										<div class="form-group col-md-12">
											<label for="email">Sayfa Başlığı *</label>
											<input type="text" class="form-control wedding_summary_title" value="{{$module['title']}}" data-parsley-required>
										</div>
										<div class="form-group col-md-12">
											<label for="email">Main Image</label>
											<input type="file" class="form-control wedding_summary_main_image">
											<input type="hidden" class="main_image_form" value="{{$module['main_image']}}"/>
											@if(isset($module['main_image_file']))
												<img src="{{url($module['main_image_file']->path)}}" style="width:100%;height:auto;margin-top:20px;"/>
											@endif
										</div>
										<div class="form-group col-md-12">
											<label for="email">Tarih *</label>
											<input type="text" class="form-control wedding_summary_date" value="{{$module['date']}}" data-parsley-required>
										</div>
										<div class="form-group col-md-6">
											<label for="email">İl</label>
											<select class="form-control wedding_summary_il">
												<option></option>
												@foreach($iller as $il)
													<option value="{{$il->il_no}}" {{$module['il'] == $il->il_no ? ("selected"):("")}}>{{$il->isim}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="email">İlçe</label>
											<select class="form-control wedding_summary_ilce">
												<option></option>
												@if($module['ilce']!="")
													@foreach($ilceler as $ilce)
														<option value="{{$ilce->ilce_no}}" {{$module['ilce'] == $ilce->ilce_no ? ("selected"):("")}}>{{$ilce->isim}}</option>
													@endforeach
												@endif
											</select>
										</div>
										<div class="form-group col-md-12">
											<label for="email">Açık Adres</label>
											<textarea class="form-control wedding_summary_address">{{$module['address']}}</textarea>
										</div>
										<div class="form-group col-md-12">
											<label for="email">Etiket (Hashtag) #AyşeileMehmetEvleniyor</label>
											<input type="text" class="form-control wedding_summary_hashtag" value="{{$module['hashtag']}}">
										</div>
									</div>
									<button type="submit" class="btn btn-primary wedding_summary_save">Kaydet</button>
								</form>
				            </div>
				        </div>
				    </div>
					<div class="card">
				        <div class="card-header" id="headingTwo">
							<a href="#" data-toggle="collapse" data-target="#collapseTwo">Sayfa Üstbilgisi ve Başlık</a><i class="flaticon-plus icon"></i>
				        </div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#myAccordion">
				            <div class="card-body">
								<form class="page_header_footer_form">
									<div class="form-group col-md-12">
										<label for="email">Sayfa Başlığı *</label>
										<input type="text" class="form-control wedding_summary_page_title" placeholder="Sayfa Başlığı" value="{{$module['page_title']}}" data-parsley-required>
									</div>
									<div class="form-group col-md-12">
										<label for="email">Hoşgeldin Mesajı</label>
										<input type="text" class="form-control wedding_summary_welcome_message" placeholder="Hoşgeldin Mesajı" value="{{$module['page_message']}}">
									</div>

									<button type="submit" class="btn btn-primary wedding_summary_save">Kaydet</button>

								</form>
							</div>
						</div>
					</div>
					<div class="card">
				        <div class="card-header" id="headingThree">
							<a href="#" data-toggle="collapse" data-target="#collapseThree">Hikayeler</a><i class="flaticon-plus icon"></i>
				        </div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#myAccordion">
				            <div class="card-body">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-story">Hikaye Ekle</button>
								<div class="row mt-3 website_stories">
									@foreach($stories as $story)
										<div class="col-md-12 story_{{$story->id}}">
											<h4>{{$story->title}}</h4>
											<a href="javscript:void(0);" class="update-story-button" data-toggle="modal" data-target="#update-story" data-story='{{$story}}'>Düzenle</a><br/><a href="javascript:void(0);" class="delete-story" data-story="{{$story->id}}">Sil</a>
										</div>
									@endforeach
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<iframe src="{{route('preview_website',['slug' => $website->id,'module' => 'home'])}}" id="preview_website" style="width:100%;height:100vh;border:0;border-radius:10px;"></iframe>
			</div>
		</div>
	</div>
</section>
<input type="hidden" value="{{csrf_token()}}" name="csrf_token" id="csrf_token"/>


<div class="modal fade" id="add-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hikaye Ekle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="add-story-form">
				<div class="modal-body">
					<div class="form-group">
						<label for="email">Başlık</label>
						<input type="text" class="form-control wedding_summary_story_title" data-parsley-required>
					</div>
					<div class="form-group">
						<label for="email">Kısa Açıklama veya Tarih</label>
						<input type="text" class="form-control wedding_summary_story_tag">
					</div>
					<div class="form-group">
						<label for="email">Açıklama</label>
						<textarea class="form-control wedding_summary_story_description" data-parsley-required placeholder="Tanışma hikayenizden birkaç cümle ile bahsedebilirsiniz."></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Ekle</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="update-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hikayeyi Güncelle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="update-story-form">
				<div class="modal-body">
					<div class="form-group">
						<label for="email">Başlık</label>
						<input type="text" class="form-control wedding_summary_story_title" data-parsley-required>
					</div>
					<div class="form-group">
						<label for="email">Kısa Açıklama veya Tarih</label>
						<input type="text" class="form-control wedding_summary_story_tag">
					</div>
					<div class="form-group">
						<label for="email">Açıklama</label>
						<textarea class="form-control wedding_summary_story_description" data-parsley-required placeholder="Tanışma hikayenizden birkaç cümle ile bahsedebilirsiniz."></textarea>
					</div>

					<input type="hidden" class="wedding_summary_story_id">
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
		$(".collapse.show").each(function(){
			$(this).prev(".card-header").find(".icon").addClass("flaticon-minus").removeClass("flaticon-plus");
		});

		$(".collapse").on('show.bs.collapse', function(){
			$(this).prev(".card-header").find(".icon").removeClass("flaticon-plus").addClass("flaticon-minus");
		}).on('hide.bs.collapse', function(){
			$(this).prev(".card-header").find(".icon").removeClass("flaticon-minus").addClass("flaticon-plus");
		});
		function sendForm($form){
			var form = $form;
            form.parsley().validate();
            if (form.parsley().isValid()){
				var postData = {};
				postData.title = $('.wedding_summary_title').val();
				postData.date = $('.wedding_summary_date').val();
				postData.il = $('.wedding_summary_il').val();
				postData.ilce = $('.wedding_summary_ilce').val();
				postData.address = $('.wedding_summary_address').val();
				postData.hashtag = $('.wedding_summary_hashtag').val();
				postData.page_title = $('.wedding_summary_page_title').val();
				postData.page_message = $('.wedding_summary_welcome_message').val();
				postData.main_image = $('.main_image_form').val();
				postData.bottom_image = $('.bottom_image_form').val();
				var formData = new FormData();
				var wedding_summary_main_image = $('.wedding_summary_main_image').prop('files')[0];
				if(typeof wedding_summary_main_image !== "undefined"){
            		formData.append('wedding_summary_main_image', wedding_summary_main_image);
        		}
				formData.append('module',"home");
				formData.append('data',JSON.stringify(postData));
				connector.ajaxFormData({
					type:"POST",
					url:"{{route('website_home_update_post')}}",
					headers:{
						'X-CSRF-TOKEN': "{{ csrf_token() }}"
					},
					data:formData
				},function(result){
					$('.wedding_summary_main_image').val('');
					$('.wedding_summary_bottom_image').val('');
					var f = document.getElementById('preview_website');
					f.src = f.src;
					alert('Sayfa güncellendi');
				});
            }
		}
		$('.wedding_summary_form').parsley();
		$('.add-story-form').parsley();
		$('.update-story-form').parsley();
		$('.wedding_summary_date').datepicker({
			language:"tr"
		});
		$('.wedding_summary_il').change(function(){
			var il = $('.wedding_summary_il option:selected').attr('value');
			connector.ajax({
				type:"POST",
				url:"{{route('ilceler')}}",
				data:{
					id:il,
					_token:$('#csrf_token').val()
				}
			},function(result){
				$('.wedding_summary_ilce').html('');
				$.each(result,function(index,ilce){
					$('.wedding_summary_ilce').append("<option value='"+ilce.ilce_no+"'>" + ilce.isim + "</option>");
				});
			});
		});

		$('.add-story-form').on('submit',function(e){
			e.preventDefault();
			var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()){
				connector.ajax({
					type:"POST",
					url:"{{route('website_home_add_story')}}",
					data:{
						title: $('.wedding_summary_story_title').val(),
						tag_date: $('.wedding_summary_story_tag').val(),
						description: $('.wedding_summary_story_description').val(),
						_token: "{{ csrf_token() }}"
					}
				},function(result){
					$.get('{{url("/html_tpl/story_line.html")}}',function(html){
						result.story.fulldata = JSON.stringify(result.story);
						var output = Mustache.render(html, result.story);
						$('.website_stories').append(output);
						var f = document.getElementById('preview_website');
						f.src = f.src;
					});
				})
			}
		});

		$('.update-story-form').on('submit',function(e){
			e.preventDefault();
			var form = $(this);
            form.parsley().validate();
            if (form.parsley().isValid()){
				connector.ajax({
					type:"POST",
					url:"{{route('website_home_update_story')}}",
					data:{
						title: $('#update-story .wedding_summary_story_title').val(),
						tag_date: $('#update-story .wedding_summary_story_tag').val(),
						description: $('#update-story .wedding_summary_story_description').val(),
						id: $('#update-story .wedding_summary_story_id').val(),
						_token: "{{csrf_token()}}"
					}
				},function(result){
					$('.website_stories').html('');
					$.each(result.stories,function(index,story){
						$.get('{{url("/html_tpl/story_line.html")}}',function(html){
							story.fulldata = JSON.stringify(story);
							var output = Mustache.render(html, story);
							$('.website_stories').append(output);

						});
					});
					var f = document.getElementById('preview_website');
					f.src = f.src;
				})
			}
		});
		$('.page_header_footer_form').on('submit',function(e){
			e.preventDefault();
			sendForm($(this));
		})
		$(".wedding_summary_form").on('submit', function(e){
            e.preventDefault();
			sendForm($(this));
        });
		$(document).on('click','.update-story-button',function(){
			var story = $(this).data('story');
			$('#update-story .wedding_summary_story_title').val(story.title);
			$('#update-story .wedding_summary_story_tag').val(story.tag_date);
			$('#update-story .wedding_summary_story_description').val(story.description);
			$('#update-story .wedding_summary_story_id').val(story.id);
		});
		$(document).on('click','.delete-story',function(){
			var id = $(this).data('story');
			connector.ajax({
				type:"POST",
				url:"{{route('website_home_delete_story')}}",
				data:{
					id: id,
					_token: "{{ csrf_token() }}"
				}
			},function(result){
				$('.story_' + id).remove();
				var f = document.getElementById('preview_website');
				f.src = f.src;
			})

		})
	});
</script>
@endsection
