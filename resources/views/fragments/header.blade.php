
<header>
    <section id="header" class="page-header" >
        <nav class="navbar navbar-default navbar-fixed-top" id="custom-bootstrap-menu" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Kibarer Property"></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="current"><a href="">Villas</a></li>
                        <li><a href="">Lands</a></li>
                        <li><a href="">Lawyer &amp; Notary</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href=""><i class="material-icons">search</i></a></li>
                    </ul>
                </div>
            </div>
            <span class="title-border"></span>

            <section class="top-nav">
                <ul>
                    <li><a href=""><i class="material-icons">business</i> Sell my Property</a></li>
                    <li><a href=""><i class="material-icons">chat</i> Blog</a></li>
                    <li><a href="{{ url('account') }}"><i class="material-icons">person</i> Account</a></li>
                </ul>
            </section>

            <span class="title-border"></span>

            <section class="lang-cur">
                <div class="flexbox justify-between">
                    <p>Language<br><span>EN</span></p>
                    <div>
                        <i class="material-icons">flag</i>
                        <i class="material-icons">keyboard_arrow_down</i>
                    </div>
                    <ul>
                        <li><a href="">English</a></li>
                        <li><a href="">French</a></li>
                        <li><a href="">Indonesian</a></li>
                        <li><a href="">Russian</a></li>
                    </ul>
                </div>

                <div class="flexbox justify-between">
                    <p>Currency<br><span>USD</span></p>
                    <div>
                        <i class="material-icons">attach_money</i>
                        <i class="material-icons">keyboard_arrow_down</i>
                    </div>
                    <ul>
                        <li><a href="">USD</a></li>
                        <li><a href="">EUR</a></li>
                        <li><a href="">IDR</a></li>
                        <li><a href="">RUB</a></li>
                    </ul>
                </div>
            </section>

            <section id="burger-nav">
                <a id="burger" href>
                    <span></span>
                    <span></span>
                </a>
            </section>
        </nav>
    </section>
</header>
