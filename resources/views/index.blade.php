<!DOCTYPE html>
<html lang="en">

    @include("fragments.head")

    <body>

        @include("fragments.header")
        <!-- IF home page, main overflow: hidden-->
        <main>

            @yield("content")

        </main>

        @include("fragments.footer")

        <!-- FORM -->
        @include("fragments.scripts")

        @yield('scripts', '')

    </body>
</html>

