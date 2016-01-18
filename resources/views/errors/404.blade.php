@extends('index')
@section('title', '404 | Page Not Found')
@section('pageId', '404')
@section('content')

<!-- Main -->
<article id="main">
    <div class="content">
        <div class="page_not_found" style="padding: 196px 0; padding-top: 96px;">
            <h1 style="width: 100%;
                       text-align: center;
                       font-size: 256px;
                       font-weight: 100;
                       color: #BC121D;">404</h1>
            <h3 style="width: 100%;
                       font-size: 90px;
                       margin: 0;
                       padding: 0;
                       margin-top: -24px;">Not Found</h3>
            <p style="width: 460px;
                      margin: auto;
                      line-height: 1.25;">
                The page you were looking for does not exist. You might've been following an old link or misspelled something in the URL.</p>
        </div>
    </div>
</article>
@stop
