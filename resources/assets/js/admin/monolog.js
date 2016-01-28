var Monolog = {

    notify: function(title, msg) {

        $('[mono-close]').html('dismiss');

        Monolog.fill(title, msg, 'active');
    },

    error: function(title, msg) {

        Monolog.fill(title, msg, 'active error');
    },

    confirm: function(title, msg, callback) {

        $('[mono-close]').html('cancel');

        Monolog.fill(title, msg, 'active confirm');

        // Remove event listener previously set by Monolog.confirm()
        $(document).off('click', '[mono-action]');

        // Attach event listener by latest Monolog.confirm() call
        $(document).on('click', '[mono-action]', function() {

            Monolog.close();

            callback();
        });
    },

    close: function() {

        $('monolog').removeClass('active');

        $('[mono-action]').attr('href', '');

        setTimeout(function() {

            $('monolog').removeClass('confirm error success');

        }, 500);

        NProgress.done();
    },

    fill: function(title, msg, classes) {

        if($('monolog').hasClass('active')) {

            $('monolog').removeClass('active');

            setTimeout(function() {

                $('monolog').removeClass('confirm error success');

            }, 500);

            setTimeout(function() {

                $('#mono-title').html(title);

                $('#mono-msg').html(msg);

                $('monolog').addClass(classes);

            }, 550);

        } else {

            $('#mono-title').html(title);

            $('#mono-msg').html(msg);

            $('monolog').addClass(classes);
        }
    }
}
