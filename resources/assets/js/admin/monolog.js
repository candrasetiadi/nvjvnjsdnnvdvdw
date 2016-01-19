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

    confirm: function(title, msg, yes) {

        if($('#monolog').hasClass('active')) {

            $('#monolog').removeClass('active');

            setTimeout(function() {

                $('#mono-title').html(title);

                $('#mono-msg').html(msg);

                $('#monolog').addClass('active confirm');

            }, 500);

        } else {

            $('#mono-title').html(title);

            $('#mono-msg').html(msg);

            $('#monolog').addClass('active confirm');
        }
    }
}
