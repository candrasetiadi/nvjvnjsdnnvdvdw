@extends('index')
<?php $title = trans('word.login') ?>
@section('title', "$title")
@section('content')

<div class="content">
    <div class="login-page">
        <h1 class="title_page">{{ trans('word.login') }}</h1>
        <div class="login-form">
            {!! Form::open(array('id' => 'cust-login-form')) !!}
            <fieldset>
                <input id="customer-login-email" type="text" name="username" placeholder="email">
            </fieldset>
            <fieldset>
                <input id="customer-login-pass" type="password" name="password" placeholder="{{ trans('word.password') }}">
            </fieldset>
            <fieldset class="action">
                <button class="submit" type="submit">{{ trans('word.login') }}</button>
            </fieldset>
            {!! Form::close() !!}
        </div>
        <span>{{ trans('word.dont_have_account') }}? <a href="{{ baseUrl() }}/{{ trans('url.register') }}">{{ trans('word.create_now') }}</a></span>
    </div><!-- END LOGIN -->
</div><!-- END CONTENT -->

@stop

@section('scripts')
<script>
    $(document).on('submit', '#cust-login-form', function(e) {

        e.preventDefault();

        fd = new FormData($('#cust-login-form')[0]);

        $.ajax({

            url: '/system/ajax/customer/login',

            type: 'POST',

            data: fd,

            processData: false,

            contentType: false,

            dataType: 'json',

            async: true,

            error: function(xhr, status, message){

            console.log(xhr.responseText);

        }}).done(function(data) {

            switch(data.status) {

                case 200:

                    window.location.href = '{{ baseUrl() }}';

                    break;

                case 201:

                    if(confirm(data.message)) {

                        window.location.href = '{{ baseUrl() . '/' . trans('url.register')}}';

                    } else {

                        return false;
                    }

                    break;

                case 404:
                case 201:
                case 501:

                    alert(data.message);

                    break;
            }
        });
    });
</script>
@stop
