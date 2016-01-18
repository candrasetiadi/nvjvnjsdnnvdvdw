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

        @include('fragments.scripts')
        @yield('scripts')
    </body>
</html>
