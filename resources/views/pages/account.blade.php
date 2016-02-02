@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Account</li>
    </ul>
</div>
<div class="line-top"></div>
<div class="container">
    <h3>ACCOUNT</h3>
    <ul>
        <li><a href="{{ route('account.wishlist', ['account' => Lang::get('url')['account']]) }}">Wishlist</a></li>
        <li><a href="{{ route('account.setting', ['account' => Lang::get('url')['account']]) }}">Setting</a></li>
        <li><a href="{{ route('logout', Lang::get('url')['logout']) }}">Logout</a></li>
    </ul>
</div>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
