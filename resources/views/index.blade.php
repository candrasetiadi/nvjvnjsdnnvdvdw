<!doctype html>
<html class="no-js" lang="en">

    @include('fragments.head')

    <body>

        @include('fragments.header')

        @yield('content')

        @include('fragments.footer')

        <div id="warning">
            <h4>Please display the website in portrait mode!</h4>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>
