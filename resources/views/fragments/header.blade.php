
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header col-lg-3">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Kibarer Property"></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder " id="navbar-main">
            <div class="col-lg-6">
                <div class="col-lg-12">
                    <ul class=" nav navbar-nav navbar-right">
                        <li><a href=""><i class="material-icons">business</i> Sell my Property</a></li>
                        <li><a href=""><i class="material-icons">chat</i> Blog</a></li>
                        <li><a href="{{ url('account') }}"><i class="material-icons">person</i> Account</a></li>
                    </ul>
                </div>
                <div class=" col-lg-12">
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 50px; margin-right:20px;">
                        <li class="active"><a href="">Villas</a></li>
                        <li><a href="">Lands</a></li>
                        <li><a href="">Lawyer &amp; Notary</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href=""><i class="material-icons">search</i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3" align="right">
                <div >
                    <p>Language</p>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="material-icons">flag</i>
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">English</a></li>
                            <li><a href="">French</a></li>
                            <li><a href="">Indonesian</a></li>
                            <li><a href="">Russian</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <p>Currency</p>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="material-icons">attach_money</i>
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">USD</a></li>
                            <li><a href="">EUR</a></li>
                            <li><a href="">IDR</a></li>
                            <li><a href="">RUB</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
