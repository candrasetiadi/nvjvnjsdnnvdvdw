@extends('index')
@section('content')


<!-- MAIN CONTAINER -->
<section id="main">

        <br><br><br><br><br><br><br>
        <h3>ACCOUNT</h3>
        <a href="{{ url('logout') }}">Logout</a>

</section>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
