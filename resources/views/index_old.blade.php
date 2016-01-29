<!doctype html>
<html class="no-js" lang="en">

    @include('fragments.head_old')

    <body>

        @include('fragments.header_old')

        @yield('content')

        @include('fragments.footer_old')

        <!-- <div id="warning">
            <h4>Please display the website in portrait mode!</h4>
        </div> -->

        @include('fragments.scripts')
        @yield('scripts')
    </body>
</html>
