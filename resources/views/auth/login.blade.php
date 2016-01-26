<!DOCTYPE HTML>
<html>
    <head>
        <title>{{ ucfirst(env('APP_NAME', 'Matter')) }} | Matter</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?= baseUrl(); ?>/assets/css/admin.css">
        <link rel="stylesheet" href="{{ asset('bower/normalize-css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('bower/nprogress/nprogress.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>

        <style>
            input{
                background-color: #F9F9F9;
            }
            body{
                background: #f9f9f9;
            }

            #login-window{
                width: 100vw;
                height: 100vh;
            }

            .wallpaper{
                background-color: lightblue;
                width: calc(100% - 480px);
                background-size: cover;
                background-position: center;
            }

            .login-container{
                width: 480px;
            }

            #login-form{
                margin: 0 auto;
                max-width: 240px;
                margin-top: calc(50vh - 140px);
            }

            h1{
                font-size: 32px;
                font-weight: 100;
                margin-bottom: 32px;
                text-transform: uppercase;
            }

            .m-input-wrapper{
                width: 100%;
            }

            input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0 1000px #f9f9f9 inset;
            }
        </style>
    </head>

    <body>
        <div class="flexbox" id="login-window">
            <div class="wallpaper">

            </div>
            <div class="login-container">
                {!! Form::open(array('id' => 'login-form', 'role' => 'form', 'autocomplete' => 'off')) !!}
                <h1>Matter</h1>
                <div id="login-form-msg"></div>

                <div class="m-input-wrapper w33-8">
                    <input type="text" name="email" id="login-email" value="{{ old('email') }}" required autocapitalize="off"/>
                    <label for="inspector">email</label>
                </div>

                <div class="m-input-wrapper w33-8" style="margin-bottom: 8px;">
                    <input type="password" name="password" id="login-password" required autocapitalize="off"/>
                    <label for="inspector">password</label>
                </div>
                <a href class="forgot-password" style="display: block; margin-bottom: 12px;">Forgot your username or password?</a>

                <div class="button-holder flexbox justify-between">
                    <a href="http://{{ env('BASE_URL') }}" class="md-button md-button-icon" id="back-button"><i class="material-icons">arrow_back</i>home</a>
                    <a href class="md-button md-button-right" id="login-button">sign in</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower/nprogress/nprogress.js') }}"></script>
        <script type="text/javascript">

            $(document).on('click', '#login-button', function(e) {

                e.preventDefault();

                login();
            });

            $(document).on('keyup', 'input', function(e) {

                if(e.which == 13 && $('#login-email').val() != '' && $('#login-password').val() != '') login();
            });

            function login() {

                NProgress.start();

                fd = new FormData($('#login-form')[0]);

                $.ajax({

                    url: "<?= baseUrl(); ?>/auth/login",

                    type: 'POST',

                    data: fd,

                    dataType: 'json',

                    contentType: false,

                    processData: false,

                    success: function(data){

                        if(data.log == '1'){

                            NProgress.done();

                            window.location = "<?= baseUrl(); ?>" + data.redirect;

                        } else{

                            console.log(data);
                        }
                    },
                    error: function(xhr, status, message){
                        console.log(xhr);
                        console.log(status);
                        console.log(message);
                        
                        NProgress.done();
                    }
                });
            }

        </script>
    </body>
</html>
