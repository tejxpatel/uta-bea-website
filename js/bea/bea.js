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

	$('.edit-officer').on('click', function(){
		var data = $(this).data('officer');

		var form = $('#officers-form');

			$(form).attr('action', 'mod/member/edit.php');

			var firstName = $(form).find('input[name="first_name"]');
			$(firstName).val(data.first_name);
			var lastName = $(form).find('input[name="last_name"]');
			$(lastName).val(data.last_name);
			var email = $(form).find('input[name="email"]');
			$(email).val(data.email);
			var title = $(form).find('input[name="title"]');
			$(title).val(data.title);
			var bio = $(form).find('textarea[name="bio"]');
			$(bio).val(data.bio);
			var major = $(form).find('input[name="major"]');
			$(major).val(data.major);
			var userName = $(form).find('input[name="user_name"]');
			$(userName).val(data.user_name);

			var pass = $(form).find('input[name="password"]');
			$(pass).addClass('border-warning');
			$(pass).attr('required', false);

			var btn = $(form).find('input[name="add"]');
			$(btn).attr('name', 'edit');

			var nI = document.createElement('input');
			nI.setAttribute('type', 'hidden');
			nI.name = 'user_id';
			nI.value = data.user_id;
			$(form).append(nI);

		var modal = $('#officersModal').modal().show();
	})

	$('.edit-event').on('click', function(){
		var data = $(this).data('event');

		var form = $('#events-form');

			$(form).attr('action', 'mod/event/edit.php');

			var name = $(form).find('input[name="name"]');
			$(name).val(data.name);
			var date = $(form).find('input[name="date"]');
			$(date).val(new Date(data.date));
			var time = $(form).find('input[name="time"]');
			$(time).val(data.time);
			var location = $(form).find('input[name="location"]');
			$(location).val(data.location);
			var description = $(form).find('textarea[name="description"]');
			$(description).val(data.description);
			var type = $(form).find('input[select="type"]');
			$(type).val(data.type);

			var btn = $(form).find('input[name="add"]');
			$(btn).attr('name', 'edit');

			var nHI = document.createElement('input');
			nHI.setAttribute('type', 'hidden');
			nHI.name = 'event_id';
			nHI.value = data.event_id;
			$(form).append(nHI);

		var modal = $('#eventModal').modal().show();
	})
})