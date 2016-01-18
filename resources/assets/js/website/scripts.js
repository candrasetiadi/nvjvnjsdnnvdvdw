var Kibarer = {

    home: function() {

        var video = document.getElementById("video");

        document.getElementById('video').play();

        var iOS = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream,
            ipad = /iPad/.test(navigator.userAgent) && !window.MSStream,
            bodyH, bodyOv;

        document.addEventListener("orientationchange", updateOrientation);

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $(video).remove();
        }


        function updateOrientation() {
            if(window.innerWidth > window.innerHeight ){
                $("#warning").addClass('active');
                $('body').css({
                    'height' : '100vh',
                    'overflow' : 'hidden',
                    'position': 'fixed'
                });
            }else {
                $("#warning").removeClass('active');
                $('body').css({
                    'height' : bodyH,
                    'overflow' : bodyOv,
                    'position': 'relative'
                });
            }
        }

        // Hover effect for touch devices
        $('body').bind('touchstart', function() {});

        // ios media querie
        if( iOS ) {
            $("body").addClass('ios-device');
        }
        if( ipad ) {
            $("body").addClass('ipad');
        }

        // button pause and play video
        $(".pause-btn").click(function(i){

            i.preventDefault();

            if($(this).hasClass('play')){
                video.pause();
            } else {
                video.play();
            }

            $(this).toggleClass("play");
        });


        $(document).ready(function() {
            hideVideo();
        });

        $(window).resize(function() {
            hideVideo();

            $('body').css({
                'height': 'auto',
                'overflow': 'auto',
                'position': 'relative'
            });

            $('#burger').removeClass('active');
            $('.fullscreen-nav').removeClass('active');
        });

        function hideVideo() {
            var windowWidth = $("#video-container").outerWidth(),
                windowHeight = $("#video-container").outerHeight(),
                videoWidth = $('#video').outerWidth(),
                videoHeight = $('#video').outerHeight(),
                videoRatio = videoWidth / videoHeight,
                windowRatio = windowWidth / (windowHeight);

            if($(window).outerWidth() > 900) {

                $("#video-container").css({'display': 'block'});
                if(windowRatio < videoRatio) {
                    //$('video').css({'height': '100%', 'width': 'auto'});

                } else {
                    //$('video').css({'height': 'auto', 'width': '100%'});
                }
            } else {
                $("#video-container").css({'display': 'none'});
            }
        }

        // Nav burger animations
        $(document).on('click', '#burger', function(i){

            i.preventDefault();

            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('.fullscreen-nav').removeClass('active');
                $('body').css({
                    'height' : 'auto',
                    'overflow' : 'auto',
                    'position': 'relative'
                });
            }else {
                $(this).addClass('active');
                $('.fullscreen-nav').addClass('active');
                $('body').css({
                    'height' : '100vh',
                    'overflow' : 'hidden',
                    'position': 'fixed'
                });
            }
        });

        // jumbotron villa land section animation
        $(document).on('click', '.catergorie-btn', function(i){

            i.preventDefault();

            var target = $(this).attr('data-target');

            $('.wrapper').removeClass('active');

            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else {
                $('.catergorie-btn').removeClass('active');
                $(target).addClass('active');
                $(this).addClass('active');
                $('#jumbotron > .wrapper').addClass('active');
            }
        });
    }
}
