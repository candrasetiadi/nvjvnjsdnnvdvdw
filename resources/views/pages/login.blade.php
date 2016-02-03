@extends('index')
@section('content')
<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Login</li>
    </ul>
</div>
<div class="line-top"><h3><small>{{ 'login' }}</small></h3></div>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        
        <div class="panel-body">
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
  </div>
</div>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
