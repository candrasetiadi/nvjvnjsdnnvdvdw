@extends('index')
@section('content')
<style type="text/css">
  .controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}
</style>
<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Sell Property</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">

    <h3>SELL PROPERTY</h3>

    <form class="form-horizontal" method="post">

    {!! csrf_field() !!}

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
        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="googleMap" style="width:100%;height:300px;"></div>
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

@section('scripts')
  <script type="text/javascript">

    var myCenter=new google.maps.LatLng(-8.6714246,115.1607031);

    function initialize() {
      var mapProp = {
        center:myCenter,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

      //search
      var input = document.getElementById('pac-input'),
        searchBox = new google.maps.places.SearchBox(input);
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
      });

      searchBox.addListener('places_changed', function() {
          
          var places = searchBox.getPlaces();
          if (places.length == 0) {
              return;
          }

          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
              if (place.geometry.viewport) {
                  // Only geocodes have viewport.
                  bounds.union(place.geometry.viewport);
              } else {
                  bounds.extend(place.geometry.location);
              }
          });
          map.fitBounds(bounds);
      });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
@endsection