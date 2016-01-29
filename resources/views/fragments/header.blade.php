
<header>
    <section id="main" class=" flexbox justify-between">

        <h1 class="logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Kibarer Property"></a>Kibarer Property</h1>

        <div class="fullscreen-nav flexbox flex-wrap justify-between">
            <section class="bottom-nav">
                <nav>
                    <ul>
                        <li class="current"><a href="">Villas</a></li>
                        <li><a href="">Lands</a></li>
                        <li><a href="">Lawyer &amp; Notary</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href=""><i class="material-icons">search</i></a></li>
                    </ul>
                </nav>

                <span class="title-border"></span>

                <section class="top-nav">
                    <ul>
                        <li><a href=""><i class="material-icons">business</i> Sell my Property</a></li>
                        <li><a href=""><i class="material-icons">chat</i> Blog</a></li>
                        <li><a href="{{ url('account') }}"><i class="material-icons">person</i> Account</a></li>
                    </ul>
                </section>

                <span class="title-border"></span>
            </section>

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
        </div>

        <section id="burger-nav">
            <a id="burger" href>
                <span></span>
                <span></span>
            </a>
        </section>
    </section>
</header>
