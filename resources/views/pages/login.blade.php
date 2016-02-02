@extends('index')
@section('content')

<div class="bs-component">
    <ul class="breadcrumb">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Login</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">
    <h3>Login</h3>

    <div class="row">
    <div class="col-md-6">

    {!! Form::open(array('url' => url('login'))) !!}
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input class="form-control" type="text" name="email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input class="form-control" type="password" name="password" id="password">
      </div>
      <div class="checkbox">
        <label>
          <input name="remember" type="checkbox"> Remember Me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    {!! Form::close() !!}
    </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
