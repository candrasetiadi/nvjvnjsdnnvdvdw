@extends('index')
<?php $title = trans('word.projects') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/projects.css') }}">
<div class="content projects-page">
    <div class="wrapper intro-wrapper">

        <div class="intro">
            <h1 class="title_page">PROJECTS</h1>
            <p>Warisan products are represented in major 5 star hotels and resorts worldwide. Further to that we have worked with most major procurement groups and some of the finest design firms worldwide. The experience gained from these encounters has helped to shape and improve our capabilities and the quality of our service.</p>
            <p>In addition to supplying 5 star hotels, we have several smaller projects, mostly owner operated, to which we have also offered our design services creating original styles for them.</p>
        </div>

        <div class="random-project-gallery flexbox flexbox-wrap">

            @foreach($randomProjects as $project)
            <div class="random-project-image" style="background-image: url('{{ url('media/projects') . '/' . $project->thumbnail }}')"></div>
            @endforeach

        </div>
    </div>

    <h2 class="title_page">Projects by year</h2>

    <ul class="calendar">
        @foreach($projectsByYear as $year => $projects)
        <?php $endYear = substr($year, 2, 2); ?>
        <a href="{{ $year }}" class="calendar-year-link"><li>20<span class="bottom-year">{{ $endYear }}</span></li></a>
        @endforeach
    </ul>


    <div class="projects-by-year">

        <?php $first = TRUE; ?>
        @foreach($projectsByYear as $year => $projects)
        <div class="project-by-year-wrapper flexbox{{ ($first ? ' active' : $first = FALSE) }}" id="projects-of-{{ $year }}">
            @foreach($projects as $project)
            <a href="{{ $projects->id }}" class="project-item">
                <h3>{{ $projects->title }}</h3>
                <p>{{ $projects->description }}</p>
            </a>
            @endforeach
        </div>
        @endforeach
    </div>

    <h2 class="title_page">Awards</h2>

    <article class="projecst-gallery">

        @foreach($awards as $a)
        <div class="column">
            <h3>{{ $a->title }}</h3>
            <p>{{ $a->description }}</p>
        </div>
        @endforeach
    </article>

    <div id="modal-holder">
        <div class="ajax-content">
            <a class="close-btn" href><i class="material-icons">clear</i></a>

            <ul class="slider">
                <li><img src="{{ asset('assets/img/store_Casa-a_large.jpg') }}" alt=""></li>
                <li><img src="{{ asset('assets/img/store_Casa-c_large.jpg') }}" alt=""></li>
                <li><img src="{{ asset('assets/img/store_Casa-d_large.jpg') }}" alt=""></li>
            </ul>

            <div class="navigation">
                <i class="material-icons arrow_left">keyboard_arrow_left</i>
                <i class="material-icons arrow_right">keyboard_arrow_right</i>
            </div>

        </div>

        <a class="close-holder" href></a>

    </div>

</div>

@stop

@section("scripts")

<script>

    $(window).load(function() {

        getRandomImage(1);
    });

    $(document).on('click', '.arrow_right', function() {

        $(".slider").css({
            'transform' : 'translate3d(-650px, 0, 0)'
        });

    });

    $(document).on('click', '.column', function() {

        $('#modal-holder').addClass('active');

    });

    $(document).on('click', '.close-btn, .close-holder', function(event) {

        event.preventDefault();

        $('#modal-holder').removeClass('active');

    });

    $(document).on('click', '.project-item', function(e) {

        e.preventDefault();

        $('#modal-holder').removeClass('active');
    });

    $(document).on('click', '.calendar-year-link', function(e) {

        e.preventDefault();

        var year = $(this).attr('href');

        $('.project-by-year-wrapper').removeClass('active');
        $('#projects-of-' + year).addClass('active');
    });

    function randomizeGallery(start, image) {

        //$('.random-project-image:nth-child(' + start + ')').attr("style", 'background-image: url(/matter/app/upload/projects/' + image + ')');

        var translation = ["-100%, 0", "100%, 0", "0, 100%", "0, -100%"];

        var random = translation[Math.floor(Math.random() * translation.length)];

        var inject = '<div class="inject" style="transform: translate3d(' + random + ', 0); background-image: url(/matter/app/upload/projects/' + image + ')"></div>';

        $('.random-project-image:nth-child(' + start + ')').append(inject);

        var next = (start < 4 ? (start += 1) : 1);

        setTimeout(function(){

            $('.random-project-image > div').addClass('active');
            $('.random-project-image > div:nth-last-child(n+2)').fadeOut();
            getRandomImage(next);

        }, 2000);
    }

    function getRandomImage(start) {

        return $.ajax({

            url: "system/ajax/project/getrandomimages",

            type: "POST",

            dataType: 'json',

            data: {controller: 'random_project_image'},

            error: function(xhr, status, message){

                console.log(xhr);

                console.log(status);

                console.log(message);

            }}).done(function(data) {

            randomizeGallery(start, data.image);
        });
    }

</script>

@stop
