@extends('index')
<?php $title = trans('word.showroom') ?>
@section('title', "$title")
@section('content')

<div class="content showroom-page">
    <div class="wrapper">

        <div class="world-map">
            <div class="bali">
                <i class="material-icons">room</i>
                <ul>
                    <li><a href class="pointer-links" data-page="pt-warisan.php"> PT. Warisan Eurindo</a></li>
                    <li><a href class="pointer-links" data-page="living-warisan.php"> Warisan Living</a></li>
                    <li><a href class="pointer-links" data-page="casa-warisan.php"> Warisan Casa</a></li>
                </ul>
            </div>

            <a href class="pointer singapore" data-page="singapore-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer italy" data-page="italy-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer africa" data-page="africa-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer india-north" data-page="north-india-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer india-south" data-page="south-india-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer washington" data-page="washington-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer la" data-page="usa-warisan.php"><i class="material-icons">room</i></a>
            <a href class="pointer tokyo" data-page="japan-warisan.php"><i class="material-icons">room</i></a>
        </div>

        <div class="showrooms">
            <h1 class="title_page">Showroom</h1>
            <div class="wrapper">
                <a href class="box" data-page="pt-warisan.php">
                    <h2>PT. Warisan Eurindo</h2>
                    <p>
                        Jl. Raya Padang Luwih 198<br>
                        Br. Tegal Jaya, Dalung<br>
                        Kuta, Bali (80361), Indonesia.
                    </p>
                </a>
                <a href class="box" data-page="casa-warisan.php">
                    <h2>Warisan Casa</h2>
                    <p>
                        Jl. Raya By Pass Ngurah Rai,<br>
                        Kedonganan, Jimbaran<br>
                        Bali (80364), Indonesia
                    </p>
                </a>
                <a href class="box" data-page="living-warisan.php">
                    <h2>Warisan Living</h2>
                    <p>
                        Jalan Raya Kerobokan 38<br>
                        Br. Taman, Kuta, Bali (80361)
                    </p>
                </a>
                <a href class="box" data-page="usa-warisan.php">
                    <h2>Los Angeles Office &amp; Showroom</h2>
                    <p>
                        1274 Center Court Drive, Suite 110<br>
                        Covina, CA 91724<br>
                    </p>
                </a>
                <a href class="box" data-page="italy-warisan.php">
                    <h2>WARISAN ITALIA CESENATICO SHOWROOM</h2>
                    <p>
                        Via Caravaggio 21,<br>
                        angolo viale Mengoni,<br>
                        47042 Cesenatico, Italy
                    </p>
                </a>
                <a href class="box" data-page="africa-warisan.php">
                    <h2>WARISAN AFRICA</h2>
                    <p>
                        The District, 41 Sir Lowry Road<br>
                        Woodstock, Cape Town
                    </p>
                </a>
                <a href class="box" data-page="south-india-warisan.php">
                    <h2>Warisan SOUTH INDIA</h2>
                    <p>
                        #1327,13th Cross, 2nd Stage, Indiranagar<br>
                        Bangalore 560038, India
                    </p>
                </a>
                <a href class="box" data-page="north-india-warisan.php">
                    <h2>Warisan NORTH INDIA OFFICE</h2>
                    <p>
                        756 Asiad Village<br>
                        Makhan Singh Block<br>
                        New Delhi, 110049
                    </p>
                </a>
                <h1 class="title_page">Representatives &amp; Stockists</h1>
                <a href class="box" data-page="singapore-warisan.php">
                    <h2>Singapore Office &amp; Showroom</h2>
                    <p>
                        65 Ubi Road 1<br>
                        #02-80 Oxley Bizhub<br>
                        Singapore 408729
                    </p>
                </a>
                <a href class="box" data-page="washington-warisan.php">
                    <h2>Muleh Home Furnishing</h2>
                    <p>
                        Muléh 2nd Store<br>
                        1831 14th Street, NW<br>
                        Washington, DC 20009
                    </p>
                </a>
                <a href class="box" data-page="japan-warisan.php">
                    <h2>Hikkaduwa - Interior Sho | Japan</h2>
                    <p>
                        Nishiazabu Shop<br>
                        1 F 3-8-17 nishiazabu<br>
                        Minato - Ku, Tokyo
                    </p>
                </a>
            </div>
        </div>
    </div>

    <div id="modal-holder"><div class="ajax-content"></div><a class="close-holder" href></a></div>
</div>
@stop


@section('scripts')

<script>
    $(document).on('click', '.box, .pointer, .pointer-links', function(event) {

        event.preventDefault(); // disable the ahref

        var page = $(this).attr("data-page"); // search for the .php page

        $.ajax({

            url: '/fragments/' + page,

            type: 'GET',

            dataType: 'text',

            async: true,

            error: function(xhr, status, message){

            console.log(xhr);

            console.log(status);

            console.log(message);

        }}).done(function(data) {

            $('.ajax-content').html(data);

            $('#modal-holder').addClass('active');

            $('body').css({
                'height': "100vh",
                'overflow': 'hidden'
            });
        });

    });

    $(document).on('click', '.close-btn, .close-holder', function(event) {

        event.preventDefault(); // disable the ahref

        $('#modal-holder').removeClass('active');

        $('body').css({
            'height': "auto",
            'overflow': 'auto'
        });
    });
</script>

@stop
