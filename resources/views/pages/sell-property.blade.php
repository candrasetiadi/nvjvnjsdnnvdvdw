@extends('index')
@section('content')

<div class="bs-component">
    <ul class="breadcrumb">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Sell Property</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">

    <h3>SELL PROPERTY</h3>

    <form class="form-horizontal" method="post">

      <div class="form-group">
        <div class="col-sm-6">
          <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="col-sm-6">
          <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
      </div>

      <div class="form-group map">  
        <div class="col-sm-12">
          <textarea name="comment" class="form-control" rows="5" placeholder="Comment"></textarea>
        </div>
      </div>

      <div class="form-group map-box">
        <label class="col-sm-12">Map</label>   
        <input type="hidden" value="0" name="map_latitude">
        <input type="hidden" value="0" name="map_longitude">
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </div>
    </form>

</div>

@stop