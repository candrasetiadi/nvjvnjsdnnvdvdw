@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">{{ ucfirst($titles) }}</li>
    </ul>
</div>
<div class="line-top"><h3><small>{{ $titles }}</small></h3></div>
<br>
<div class="container">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-body">
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
            <div id="googleMap" style="width:100%;height:500px;"></div>
            <input type="hidden" value="0" name="map_latitude" id="map_latitude">
            <input type="hidden" value="0" name="map_longitude" id="map_longitude">
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
  <script type="text/javascript">

    var myCenter=new google.maps.LatLng(-8.4420734,114.9356164);

    function initialize() {
      var mapProp = {
        center:myCenter,
        zoom:10,
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

      google.maps.event.addListener(map, "click", function (e) {

        var latLng = e.latLng,
            strlatlng = latLng.toString(),
            spllatlng = strlatlng.split(','),
            lats = spllatlng[0].replace("(", ""), 
            longs = spllatlng[1].replace(")", "");

        $("#map_latitude").val(lats);
        $("#map_longitude").val(longs);
        placeMarker(latLng, map);

      });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    function placeMarker(location, map) {
      var marker = new google.maps.Marker({
          position: location, 
          map: map
      });
    }
  </script>
@endsection