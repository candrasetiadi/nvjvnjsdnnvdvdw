@extends('index')
@section('content')


<!-- MAIN CONTAINER -->
<section id="main">

        <br><br><br><br><br><br><br>
        <h3>LOGIN</h3>

        <form method="post">
            {!! csrf_field() !!}
            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password" id="password">
            </div>

            <div>
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>

</section>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
