@extends('index')
@section('content')


<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li><a href="{{ route('account', Lang::get('url')['account']) }}">Account</a></li>
        <li class="active">Setting</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">
    <h3>SETTING</h3>
</div>

@stop