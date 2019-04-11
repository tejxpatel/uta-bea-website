$(document).ready(function(){
	var bgColor = $('body').css('backgroundColor');
	var nav = $('nav');
	$(window).on('scroll', function(){
		if($(window).scrollTop() > 20){
			nav.css('backgroundColor', bgColor);
		} else {
			nav.css('backgroundColor', 'transparent');
		}
		
	});
	$('.hover').each(function(){
		$(this).hover(function(){
			$(this).find('>:first-child').toggleClass('fadeOutDown fadeInUp');
		});
	})
})