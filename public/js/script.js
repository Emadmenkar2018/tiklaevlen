$(document).ready(function(){
	/*
	$("body").niceScroll({
		cursorcolor:"#777677",
		cursorborder:"0",
		background:"#DBDBDB"
	});
	*/
	$('[data-toggle="tooltip"]').tooltip();

	$('.loadmore i').click(function(){
		$('.questions').toggleClass('open');
		$(this).toggleClass('flaticon-arrow-up');
	})
});
