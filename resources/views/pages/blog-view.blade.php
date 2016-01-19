@extends('index')
@section('title', "$blog->title")
@section('content')

<div class="content blog">
    <div class="wrapper">
        <h1 class="title_page">{{ $blog->title }}</h1>
        <div class="blog-image-wrapper"><img src="{{ asset('media/blog') }}/{{ $blog->image }}" alt="{{ $blog->title }}"></div>

        <span class="detail-info"><i class="fa fa-calendar"></i> {{ $blog->created_at }}
            <i class="material-icons">visibility</i> {{ $blog->views }}
            <i class="fa fa-folder-open-o"></i> Wood, Customer Review
        </span>

        <p>{!! $blog->content !!}</p>

        <a href="{{ baseUrl() }}/blogs" class="red-border-btn" style="font-size: 11px; margin-top: 0;">Back to blogs</a>
    </div>
</div>
@stop


@section('scripts')

@stop
