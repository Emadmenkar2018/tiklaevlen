$(document).ready(function(){
	$(document).on('click','.rsvp_btn',function(){
		var post_data = {};
		post_data.name = $('.rsvp_name').val();
		post_data.email = $('.rsvp_email').val();
		post_data.message = $('.rsvp_messages').val();
		post_data.guests = $('.rsvp_guests').val();
		post_data.user = $('.website_user').val();
		post_data._token = $('.token').val();
		if(post_data.name == "" || post_data.email == "" || post_data.message == "" || post_data.guests == ""){
			alert('Lütfen tüm alanları doldurunuz.');
			return false;
		}else{
			$.ajax({
				method: "POST",
				url: "/setGuest",
				data: post_data
			})
			.done(function(response) {
				alert('Kaydınız alınmıştır.');
			});
		}

	});
});
