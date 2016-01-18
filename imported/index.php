<? 
//$PUBLICPATH = "http://www.kibarer.com/";
$PUBLICPATH = "http://dev.kesato.com/kibarer/";
//$PUBLICPATH = "http://localhost:8888/";
$PAGE = isset($_GET['page']) && $_GET['page']!='' ? $_GET['page'] : 'home'; 

//require_once("config.php");

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kibarer Property</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?= $PUBLICPATH ?>assets/css/normalize.min.css">
        <link rel="stylesheet" href="<?= $PUBLICPATH ?>assets/css/main.css">
        <link rel="stylesheet" href="<?= $PUBLICPATH ?>assets/css/mediaqueries.css">

        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

        <!-- NAV & HEADER -->
        <header>
            <section class="row flexbox justify-between">

                <h1 class="logo"><a href="#"><img src="<?= $PUBLICPATH ?>assets/img/logo.png" alt="Kibarer Property"></a>Kibarer Property</h1>

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
                                <li><a href=""><i class="material-icons">person</i> Account</a></li>
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

        <!-- JUMBO VIDEO -->
        <section id="jumbotron">

            <!-- VIDEO -->
            <div id="video-container">
                <video id="video" autoplay="autoplay" loop="loop" muted="muted">
                    <source src="<?= $PUBLICPATH ?>assets/video/Alban48s.m4v" type="video/mp4">
                    <source src="<?= $PUBLICPATH ?>assets/video/Alban48s.webm" type="video/webm">
                </video>
            </div>

            <div class="wrapper">
                <h2>Your dreams come to live</h2>
                <a class="btn md-button catergorie-btn" data-target="#villa"><i class="material-icons">home</i>Search Villa</a>
                <a class="btn md-button catergorie-btn" data-target="#land"><i class="material-icons">pin_drop</i>Search Land</a>
            </div>

            <a class="pause-btn play" href>
                <i class="show material-icons">pause_circle_outline</i>
                <i class="hide material-icons">play_circle_outline</i>
            </a>

            <!-- CATERGORIES -->  
            <div class="categories">

                <div class="wrapper flexbox flexbox-wrap justify-between" id="villa">
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Investment <br> <span>under $500.000</span></h3>
                            <h4>First investment <br><span>8% - 12% NET R.O.I.</span></h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Investment <br><span>over $500.000</span></h3>
                            <h4>Luxurious Villas <br><span>8% - 12% NET R.O.I. Capital gain</span></h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Home &amp; <br><span>Retirement</span></h3>
                            <h4>Find here more than 1000 real estate for sale</h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Beachfront <br><span>Properties</span></h3>
                            <h4>Your tropical Dolce Vita</h4>
                        </div>
                    </a>
                </div>

                <div class="wrapper flexbox flexbox-wrap justify-between" id="land">
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Investment <br> <span>under $500.000</span></h3>
                            <h4>First investment <br><span>8% - 12% NET R.O.I.</span></h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Investment <br><span>over $500.000</span></h3>
                            <h4>Luxurious Villas <br><span>8% - 12% NET R.O.I. Capital gain</span></h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Home &amp; <br><span>Retirement</span></h3>
                            <h4>Find here more than 1000 real estate for sale</h4>
                        </div>
                    </a>
                    <a href="">
                        <div class="text-wrapper">
                            <h3>Beachfront <br><span>Properties</span></h3>
                            <h4>Your tropical Dolce Vita</h4>
                        </div>
                    </a>
                </div>

            </div>

        </section>

        <!-- MAIN CONTAINER -->
        <section id="main"> 

            <!-- LOCATIONS TITLE -->
            <section class="section-title">
                <h3 class="section-title">Locations <br><span>Find your property in the different area of Bali</span></h3>
            </section>

            <!-- LOCATION BOXES -->
            <section class="locations flexbox flexbox-wrap justify-between">
                <div class="double" style="background-image: url('<?= $PUBLICPATH ?>assets/img/seminyak.jpg');">
                    <h2>Seminyak</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div style="background-image: url('<?= $PUBLICPATH ?>assets/img/sanur.jpg');">
                    <h2>Sanur</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div style="background-image: url('<?= $PUBLICPATH ?>assets/img/canggu.jpg');">
                    <h2>Cangu</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div style="background-image: url('<?= $PUBLICPATH ?>assets/img/ubud.jpg');">
                    <h2>Ubud</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div style="background-image: url('<?= $PUBLICPATH ?>assets/img/jimbaran.jpg');">
                    <h2>Jimbaran</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div style="background-image: url('<?= $PUBLICPATH ?>assets/img/lovina.jpg');">
                    <h2>Lovina</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
                <div class="double" style="background-image: url('<?= $PUBLICPATH ?>assets/img/tanahlot.jpg');">    
                    <h2>Tanah Lot</h2>
                    <div class="desc flexbox flexbox-wrap justify-center">
                        <div>
                            <h4><i class="material-icons">home</i>Villa</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Home &amp; Retirement</a>
                                <a href="">Beach front properties</a>
                                <a href="">Villa for rent</a>
                            </p>    
                        </div>
                        <div>
                            <h4><i class="material-icons">pin_drop</i>Land</h4>
                            <p>
                                <a href="">Investment &lt; $500.000</a>
                                <a href="">Investment &gt; $500.000</a>
                                <a href="">Beach front</a>
                            </p> 
                        </div>
                    </div>
                </div>
            </section>

            <!-- BLOG & TESTIMONIALS -->
            <section class="bottom-section flexbox flexbox-wrap justify-between">
                <section class="w66">
                    <h3 class="section-title left">Testimonials<br><span>Find your property in the different area of Bali</span></h3>
                    <div class="testimonials flexbox flexbox-wrap justify-between">
                        <a href="" class="flexbox flexbox-wrap justify-between" style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial1.png');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" class="flexbox flexbox-wrap justify-between" style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial2.jpg');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" class="flexbox flexbox-wrap justify-between"  style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial3.jpg');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" class="flexbox flexbox-wrap justify-between" style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial4.png');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" class="flexbox flexbox-wrap justify-between" style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial5.png');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" class="flexbox flexbox-wrap justify-between" style="background-image:url('<?= $PUBLICPATH ?>assets/img/testimonial6.jpeg');">
                            <div class="desc">
                                <h4>More than 10% ROI already</h4>
                                Marilyn S
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                    </div>
                </section>

                <section class="w33">
                    <h3 class="section-title left">Blog<br><span>Find your property in the different area of Bali</span></h3>
                    <div class="blog flexbox flexbox-wrap justify-between">
                        <a href="" style="background-image: url('<?= $PUBLICPATH ?>assets/img/blog1.jpg');">
                            <div class="desc">
                                <h3>Money of Indonesia <br>
                                    <span class="date">22 Jan 2016</span>
                                </h3>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros velit</p>            
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" style="background-image: url('<?= $PUBLICPATH ?>assets/img/blog2.jpg');">
                            <div class="desc">
                                <h3>Ngurah Rai Airport On High Alert <br>
                                    <span class="date">22 Jan 2016</span>
                                </h3>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros velit</p>
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                        <a href="" style="background-image: url('<?= $PUBLICPATH ?>assets/img/blog1.jpg');">
                            <div class="desc">
                                <h3>Amazing Places To Watch The Sunrise In Indonesia <br>
                                    <span class="date">22 Jan 2016</span>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros velit</p>
                                <div class="md-button md-button-outline">Read more</div>
                            </div>
                        </a>
                    </div>
                </section>
            </section>
        </section>

        <footer>
            <section class="row flexbox flexbox-wrap justify-between">
                <div>
                    <h2>Blog</h2>
                    <ul>
                        <li><a href="">Investissement villa Bali</a></li>
                        <li><a href="">Tourist Destination</a></li>
                        <li><a href="">Uncategorized</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Links</h2>
                    <ul>
                        <li><a href="">Resource</a></li>
                        <li><a href="">Site Map</a></li>
                        <li><a href="">Sold Villas</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Accounts</h2>
                    <ul>
                        <li><a href="">My Account</a></li>
                        <li><a href="">Favorites</a></li>
                    </ul>
                </div>
                <div>
                    <h2>Partners</h2>
                    <ul>
                        <li><a href="">Bali Je t’aime</a></li>
                        <li><a href="">Atlantis International</a></li>
                    </ul>
                </div>
                <div class="gicontact">
                    <div class="flexbox flexbox-wrap justify-between">
                        <a href=""><span class="icon-facebook"></span></a>
                        <a href=""><span class="icon-google-plus"></span></a>
                        <a href=""><span class="icon-twitter"></span></a>
                        <a href=""><span class="icon-linkedin"></span></a>
                        <a href=""><span class="icon-youtube"></span></a>
                        <a href=""><span class="icon-skype"></span></a>
                    </div>
                    <div class="input">
                        <input type="text" placeholder="Subscribe to our newsletter"><div class="fab-button fab-button-small  fab-button-transparent"><a href=""><i class="material-icons">done</i></a></div>
                    </div>
                    <div class="copyright">&copy; Copyright 2016 - Kibarer Development</div>
                </div>
            </section>
        </footer>

        <div id="warning">
            <h4>Please display the website in portrait mode!</h4>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="<?= $PUBLICPATH ?>assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
-->
    </body>
</html>