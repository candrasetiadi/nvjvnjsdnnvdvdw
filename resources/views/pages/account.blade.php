@extends('index')
@section('content')


<!-- MAIN CONTAINER -->
<section id="main">

        <br><br><br><br><br><br><br>
        <h3>ACCOUNT</h3>

        <ul>
            <li><a href="{{ route('account.wishlist', ['account' => Lang::get('url')['account']]) }}">Wishlist</a></li>
            <li><a href="{{ route('account.setting', ['account' => Lang::get('url')['account']]) }}">Setting</a></li>
            <li><a href="{{ route('logout', Lang::get('url')['logout']) }}">Logout</a></li>
        </ul>

</section>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
