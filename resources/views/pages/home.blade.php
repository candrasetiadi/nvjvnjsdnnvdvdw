@extends('index')
<?php $title = trans('word.home') ?>
@section('title', "$title")
@section('content')

@include('fragments/home_banner')

<div id="home-boxes-wrap" class="home-boxes-wrapper">
    <div class="home-box box-1">
        <a href="{{ baseUrl() . '/' . trans('url.about') }}">
            <div class="desc">
                <span class="left">
                    <img src="{{ asset('assets/img/common/company.png') }}">
                </span>
                <span class="right">
                    <strong>company profile</strong>
                    <p class="short-desc">lorem ipsum dolor sit amet</p>
                </span>
            </div>
        </a>
    </div>
    <div class="home-box box-2">
        <a href="{{ baseUrl() . '/' . trans('url.products') }}">
            <div class="desc">
                <span class="left">
                    <img src="{{ asset('assets/img/common/products.png') }}">
                </span>
                <span class="right">
                    <strong>products</strong>
                    <p class="short-desc">lorem ipsum dolor sit amet</p>
                </span>
            </div>
        </a>
    </div>
    <div class="home-box box-3">
        <a href="{{ baseUrl() . '/' . trans('url.projects') }}">
            <div class="desc">
                <span class="left">
                    <img src="{{ asset('assets/img/common/projects.png') }}">
                </span>
                <span class="right">
                    <strong>projects</strong>
                    <p class="short-desc">lorem ipsum dolor sit amet</p>
                </span>
            </div>
        </a>
    </div>
</div>

<a class="banner-title" href="{{ baseUrl() . '/' . trans('url.showroom') }}">
    <h5 class="title">showrooms</h5>
    <p class="desc">lorem ipsum dolot sit amet</p>
</a>

<div class="home-articles">
    <div class="content">

        <div class="home-catalog">

            <div class="dotts">
                <span class="dot active" data-slide="0" data-type="catalogue"></span>
                <span class="dot" data-slide="1" data-type="catalogue"></span>
                <span class="dot" data-slide="2" data-type="catalogue"></span>
            </div>

            <span class="title">
                our
                <strong>catalogues</strong>
            </span>

            <div class="catalogues" id="catalogue">

                @include('fragments/home_catalogues')

            </div>
            <span class="see-all">
                <a href="{{ baseUrl() . '/' . trans('url.catalogues') }}">see all...</a>
            </span>
            <div class="gradient"></div>
            <!-- END HOME POST -->
        </div>

        <div class="home-post">

            <div class="dotts">
                <span class="dot active" data-slide="0" data-type="blog"></span>
                <span class="dot" data-slide="1" data-type="blog"></span>
                <span class="dot" data-slide="2" data-type="blog"></span>
            </div>

            <span class="title">
                latest
                <strong>news</strong>
            </span>

            <div class="catalogues" id="blog">

                @include('fragments/home_blog')

            </div>

            <span class="see-all">
                <a href="{{ baseUrl() . '/' . trans('url.blogs') }}">see all...</a>
            </span>
            <div class="gradient"></div>

        </div>
    </div>
</div>

@stop


@section('scripts')

<script>
    $(document).on('click', '.dot', function() {

        $(this).siblings().removeClass('active');

        $(this).addClass('active');

        var type = $(this).attr('data-type'),
            slide = $(this).attr('data-slide'),
            basenr;

        if(type == 'blog') {

            basenr = 370;

        } else {

            basenr = 330;
        }

        $('#' + type).css({

            'transform' : 'translate3d(-'+ (basenr * slide) +'px, 0, 0)'
        });

    });

    var slideN = {{ (count($homeSlides) - 1) }};

    var current = 1;

    $(window).load(function() {

        slideHome(0);

        function slideHome() {

            var lastChild = $('.home-banner-item:last-child');

            lastChild.remove();

            $('.home-banner').prepend(lastChild);

            current++;

            if(current == slideN) {

                current = 0;
            }

            setTimeout(function() {

                slideHome(current);

            }, 5000);
        }
    });
</script>

@stop
