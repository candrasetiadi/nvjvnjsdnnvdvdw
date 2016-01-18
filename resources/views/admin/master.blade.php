@if ($BASE_URL = '/') @endif
<!DOCTYPE html>
<html lang="en">
    @include('admin.fragments.head')
    <body>
        <div class="app-wrapper" id="app-wrapper">

            <div class="navbar-container">

                <div class="navbar">

                    <h3 class="app-title">{{ env('APP_NAME', 'matter') }}</h3>

                    <ul class="mini-menu flexbox">
                        <li style="display: none;">
                            <a href class="mini-link-notif notif"><i class="material-icons">notifications_none</i><span class="notif-count">99</span></a>
                            <div class="mini-menu-expand notification-wrapper">
                                <ul>
                                    <li>
                                        <div id="notif-header">
                                            <p>NOTIFICATIONS</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href>New Notification</a>
                                    </li>
                                    <li>
                                        <a href>New Notification</a>
                                    </li>
                                    <li>
                                        <a href>New Notification</a>
                                    </li>
                                    <li>
                                        <a href>view all</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li style="display: none;"><a href id="mini-link-messsages" class="notif"><i class="material-icons">send</i><span class="notif-count">1</span></a>
                        <li><a href class="admin-user">Warisan Admin<i class="material-icons">expand_more</i></a>
                            <div class="mini-menu-expand admin-profile-wrapper">
                                <ul>
                                    <li>
                                        <div id="notif-header">
                                            <p>Warisan Admin</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/auth/logout">log out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    @include('admin.fragments.navbar')

                    @yield('fab', '')

                </div>

            </div>

            <section class="app-content">

                @yield('header', '')

                <div class="content-wrapper page-@yield('page')">

                    @yield('content')

                </div>


                <div class="end-of-scroll-wrapper">
                    <svg width="1477px" height="177px" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 177 Q 738.5 -96 1477 177Z" stroke="none" fill="rgba(0, 0, 0, .15)"/>
                    </svg>
                </div>
            </section>

        </div>

        <div id="monolog" class="shadow shadow-hover">
            <a href id="mono-close"><i class="material-icons">close</i></a>
            <p id="mono-title">
                BlogController notice:
            </p>

            <p id="mono-msg">
                Some message.. This and this has been working correctly..
            </p>
        </div>

        @yield('modal', '')

        @include('admin.fragments.footscripts')

        <script>
            $(window).load(function(){
                loadScrollLimit();
            });

            $(window).resize(function() {
                loadScrollLimit();
            });

            function loadScrollLimit() {
                $('svg').attr('width', $(window).outerWidth() + 'px');
                $('svg').attr('height', (($(window).outerWidth() / 100) * 12) + 'px');
                path = 'M0 ' + ($(window).outerWidth() / 100) * 12 + ' Q ' + $(window).outerWidth() / 2 + ' ' + '-' + ((($(window).outerWidth() / 100) * 12) / 1.24) + ' ' + $(window).outerWidth() + ' ' + ($(window).outerWidth() / 100) * 12 + 'Z';
                $('svg > path').attr('d', path);
            }
        </script>

        @yield('scripts', '')

        @yield('script', '')
    </body>
</html>
