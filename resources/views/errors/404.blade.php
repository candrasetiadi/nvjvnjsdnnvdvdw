@extends('index')
@section('title', '404 | Page Not Found')
@section('pageId', '404')
@section('content')

<!-- Main -->
<article id="main">
    <div class="content">
        <div class="page_not_found">
            <h1 style="width: 100%;
                       text-align: center;
                       font-size: 256px;
                       font-weight: 100;
                       color: #ee5b2c;">404</h1>
            <h3 style="width: 100%;
                       font-size: 90px;
                       margin: 0;
                       padding: 0;
                       text-align: center;">Not Found</h3>
            <p style="width: 460px;
                      margin: auto;
                      line-height: 1.25;
                      color: #6f6f6f;
                      text-align: center;">
                The page you were looking for does not exist. You might've been following an old link or misspelled something in the URL.</p>
        </div>
    </div>
</article>
@stop
