<html>
	<body>
		<div class="root"></div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="{{asset('js/mustache.min.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$.get("{{url($website->html_file->path)}}",function(html){
					console.log(@json($website->modules["home"]));
					var data = {
						user_id: '{{$website->user}}',
						base_url: '{{$website->base_url}}',
						page_title: '{{$website->modules["home"]["page_title"]}}',
						page_message: '{{$website->modules["home"]["page_message"]}}',
						stories: @json($website->modules["home"]["stories"]),
						schedules_arr: @json($website->modules["schedule"]["schedules"]),
						registry_arr: @json($website->modules["registry"]),
						photos_arr: @json($website->modules["photos"]),
						date:'{{$website->modules["home"]["date"]}}',
						il:'{{isset($website->modules["home"]["il"]["isim"]) ? ($website->modules["home"]["il"]["isim"]):("")}}',
						ilce:'{{isset($website->modules["home"]["ilce"]["isim"]) ? ($website->modules["home"]["ilce"]["isim"]):("")}}',
						address:'{{$website->modules["home"]["address"]}}',
						hashtag:'{{$website->modules["home"]["hashtag"]}}',
						main_image:'{{url(isset($website->modules["home"]["main_image_file"]->path) ? ($website->modules["home"]["main_image_file"]->path):(""))}}',
						bottom_image:'{{url(isset($website->modules["home"]["bottom_image_file"]->path) ? ($website->modules["home"]["bottom_image_file"]->path):(""))}}',
						token:'{{csrf_token()}}'
					};

					var active_module = "{!! $website->active_module !!}";
					if(active_module  == "home"){
						data.home = true;
					}else if (active_module == "schedule") {
						data.schedule = true;
					}else if(active_module == "registry"){
						data.registry = true;
					}else if(active_module == "photos"){
						data.photos = true;
					}

					var output = Mustache.render(html,data);
					$('html').html(output);
				})
			});
		</script>
		@if($website->template_name == "sunshine")
			<script src="/websites/sunsine/js/popper.min.js"></script>
			<script src="/websites/sunsine/js/bootstrap.min.js"></script>
			<script src="/websites/sunsine/js/owl.carousel.min.js"></script>
			<script src="/websites/sunsine/js/isotope.pkgd.min.js"></script>
			<script src="/websites/sunsine/js/jquery.counterup.min.js"></script>
			<script src="/websites/sunsine/js/imagesloaded.pkgd.min.js"></script>
			<script src="/websites/sunsine/js/scrollIt.js"></script>
			<script src="/websites/sunsine/js/jquery.scrollUp.min.js"></script>
			<script src="/websites/sunsine/js/jquery.ajaxchimp.min.js"></script>
			<script src="/websites/sunsine/js/wow.min.js"></script>
			<script src="/websites/sunsine/js/nice-select.min.js"></script>
			<script src="/websites/sunsine/js/gijgo.min.js"></script>
			<script src="/websites/sunsine/js/jquery.countdown.min.js"></script>
			<script src="/websites/sunsine/js/jquery.slicknav.min.js"></script>
			<script src="/websites/sunsine/js/jquery.magnific-popup.min.js"></script>
			<script src="/websites/sunsine/js/plugins.js"></script>
			<script src="/websites/sunsine/js/rsvp.js"></script>
			<script src="/websites/sunsine/js/main.js"></script>
		@elseif($website->template_name == "real_wedding")
			<script src="/websites/real_wedding/js/popper.min.js"></script>
			<script src="/websites/real_wedding/js/bootstrap.min.js"></script>
		    <!-- ALL PLUGINS -->
			<script src="/websites/real_wedding/js/jquery.magnific-popup.min.js"></script>
		    <script src="/websites/real_wedding/js/jquery.pogo-slider.min.js"></script>
			<script src="/websites/real_wedding/js/slider-index.js"></script>
			<script src="/websites/real_wedding/js/smoothscroll.js"></script>
			<script src="/websites/real_wedding/js/form-validator.min.js"></script>
		    <script src="/websites/real_wedding/js/contact-form-script.js"></script>
		    <script src="/websites/real_wedding/js/custom.js"></script>
			<script src="/websites/sunsine/js/rsvp.js"></script>
		@elseif($website->template_name == "hookup")
			<script src="/websites/sunsine/js/popper.min.js"></script>
			<script src="/websites/hookup/js/vendor/bootstrap.min.js"></script>
			<script src="/websites/hookup/js/owl.carousel.min.js"></script>
			<script src="/websites/hookup/js/jquery.sticky.js"></script>
			<script src="/websites/hookup/js/parallax.min.js"></script>
			<script src="/websites/hookup/js/jquery.nice-select.min.js"></script>
			<script src="/websites/hookup/js/countdown.js"></script>
			<script src="/websites/hookup/js/jquery.magnific-popup.min.js"></script>
			<script src="/websites/hookup/js/main.js"></script>
			<script src="/websites/sunsine/js/rsvp.js"></script>

		@elseif($website->template_name == "invits")
		<script src="/websites/invits/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="/websites/invits/assets/js/popper.min.js"></script>
		<script src="/websites/invits/assets/js/bootstrap.min.js"></script>
		<!-- Jquery Mobile Menu -->
		<script src="/websites/invits/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
		<script src="/websites/invits/assets/js/owl.carousel.min.js"></script>
		<script src="/websites/invits/assets/js/slick.min.js"></script>
		<!-- Date Picker -->
		<script src="/websites/invits/assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
		<script src="/websites/invits/assets/js/wow.min.js"></script>
		<script src="/websites/invits/assets/js/animated.headline.js"></script>
		<script src="/websites/invits/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
		<script src="/websites/invits/assets/js/jquery.scrollUp.min.js"></script>
		<script src="/websites/invits/assets/js/jquery.nice-select.min.js"></script>
		<script src="/websites/invits/assets/js/jquery.sticky.js"></script>

		<!-- contact js -->
		<script src="/websites/invits/assets/js/contact.js"></script>
		<script src="/websites/invits/assets/js/jquery.form.js"></script>
		<script src="/websites/invits/assets/js/jquery.validate.min.js"></script>
		<script src="/websites/invits/assets/js/mail-script.js"></script>
		<script src="/websites/invits/assets/js/jquery.ajaxchimp.min.js"></script>
		<script src="/websites/sunsine/js/rsvp.js"></script>
		<!-- Jquery Plugins, main Jquery -->
		<script src="/websites/invits/assets/js/plugins.js"></script>
		<script src="/websites/invits/assets/js/main.js"></script>
		@endif
	</body>
</html>
