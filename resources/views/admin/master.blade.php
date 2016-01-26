@if ($BASE_URL = '/') @endif
<?php $admin = Auth::user()->get(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.fragments.head')
        @include('admin.fragments.footscripts')
        @yield('scripts', '')
    </head>
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
                        <li><a href class="admin-user">{{ $admin->firstname . ' ' . $admin->lastname }}<i class="material-icons">expand_more</i></a>
                            <div class="mini-menu-expand admin-profile-wrapper">
                                <ul>
                                    <li>
                                        <div id="notif-header">
                                            <p>Kibarer Admin</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ url('logout') }}">log out</a>
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

            </section>

        </div>

        <monolog>
            <p id="mono-title">
                BlogController notice:
            </p>

            <p id="mono-msg">
                Some message.. This and this has been working correctly..
            </p>

            <mono-buttons class="flexbox">
                <m-button mono-button mono-action>yes</m-button>
                <m-button href="modalClose" mono-button mono-close>dismiss</m-button>
            </mono-buttons>
        </monolog>

        @yield('modal', '')
    </body>
</html>
