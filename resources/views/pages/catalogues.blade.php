@extends('index')
<?php $title = trans('word.catalogues') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/catalogues.css') }}">
<div class="content catalogue-page">

    <div class="wrapper flexbox">

        <h1 class="title_page">{{ trans('word.catalogues') }}</h1>

        @foreach($pdf as $catalogue)
        <div class="blog-item flexbox">
            <div class="blog-img">
                <img src="{{ asset('media/pdf/thumbnail') . '/' . $catalogue->thumbnail }}">
            </div>
            <div class="blog-text">
                <h2 class="catalogue-title">{{ $catalogue->title }}</h2>
                <p class="catalogue-info">{{ $catalogue->title }}</p>
                <p class="catalogue-date">{{ $catalogue->created_at }}</p>
                <div class="sec-line">
                    <a href="{{ baseUrl() }}/pdfcatalogue/{{ $catalogue->file }}">{{ trans('word.read_more') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop
