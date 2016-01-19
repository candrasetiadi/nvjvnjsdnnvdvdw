var Monolog = {

    notify: function(title, msg) {

        Monolog.fill(title, msg, 'active');
    },

    error: function(title, msg) {

        Monolog.fill(title, msg, 'active error');
    },

    confirm: function(title, msg, callback) {

        Monolog.fill(title, msg, 'active confirm');

        $('#mono-action').attr('href', callback);
    },

    close: function() {

        $('#monolog').removeClass('active');

        setTimeout(function() {

            $('#monolog').removeClass('confirm error success');

        }, 500);
    },

    fill: function(title, msg, classes) {

        if($('#monolog').hasClass('active')) {

            $('#monolog').removeClass('active');

            setTimeout(function() {

                $('#monolog').removeClass('confirm error success');

            }, 500);

            setTimeout(function() {

                $('#mono-title').html(title);

                $('#mono-msg').html(msg);

                $('#monolog').addClass(classes);

            }, 550);

        } else {

            $('#mono-title').html(title);

            $('#mono-msg').html(msg);

            $('#monolog').addClass(classes);
        }
    }
}
