@extends('index')
@section('title', 'Empty Cart')
@section('pageId', 'empty')
@section('content')

<!-- Main -->
<article id="main">
    <div class="content">
        <div class="page_not_found" style="padding: 196px 0; padding-top: 96px;">
            <h1 style="width: 100%;
                       text-align: center;
                       font-size: 84px;
                       font-weight: 600;
                       color: #BC121D;">BUMMER</h1>
            <h3 style="width: 100%;
                       font-size: 32px;
                       margin: 0;
                       padding: 0;
                       margin-top: 0;">Your shopping cart is empty</h3>
            <p style="width: 460px;
                      margin: auto;
                      line-height: 1.25;">
                Your cart is empty. View our catalog to check out our products.</p>
        </div>
    </div>
</article>
@stop
