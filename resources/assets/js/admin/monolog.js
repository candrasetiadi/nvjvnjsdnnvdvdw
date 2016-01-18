var Monolog = {

	notify: function(title, msg) {

		if($('#monolog').hasClass('active')) {

			$('#monolog').removeClass('active');

			setTimeout(function() {

				$('#mono-title').html(title);

				$('#mono-msg').html(msg);

				$('#monolog').addClass('active');

			}, 500);
			
		} else {

			$('#mono-title').html(title);

			$('#mono-msg').html(msg);

			$('#monolog').addClass('active');
		}
	},

	confirm: function(qst, yes, no) {

		if(confirm(qst)){

			yes('Blog action', 'Blog deleted');

		} else {

			no('Blog action', 'Blog deletion canceled');
		}
	}
}