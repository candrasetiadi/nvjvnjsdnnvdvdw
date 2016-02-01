@extends('index')
@section('content')
<style type="text/css">

    @media only screen and (max-width: 980px) {
        #map{
            visibility: hidden;
        }
    }

    #map {
        height: 1000px;
        display: inline-block;

    }

    .atas{
        height: 50px;
        background-color: #ee5b2c;
    }

    .types{
        display:inline-block; 
        margin-right:10px; 
        background-color:#ddd; 
        padding:10px;
        border: 1px solid #aaa;
    }
    
</style>
<!-- MAIN CONTAINER -->
<section class="">
    <div class="atas"></div>
        <!-- <div style="width:60%; min-height:1000px; margin:10px;" class="panel-header pre-scrollable"> -->
        <div class="panel panel-default pre-scrollable col-lg-8" style="min-height:1000px;">
            <form class="form-horizontal panel-body">
                <div class="form-group ">
                    <label class="col-sm-2 control-label">Type</label>
                    <label class="types">
                        >$500.000
                        <input type="radio" name="type" id="radio1">
                    </label>
                    <label class="types">
                        <$500.000
                        <input type="radio" name="type" id="radio2">
                    </label>
                    <label class="types">
                        Home & Retir.
                        <input type="radio" name="type" id="radio3">
                    </label>
                    <label class="types">
                        Beachfront
                        <input type="radio" name="type" id="radio4">
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Location</label>
                    <span style="display:inline-block;" >
                        <input id="searchTextField" type="text" value="" placeholder="Location" onChange="searching()">
                    </span>
                </div>
                <br>
                <div class="form-group" >
                    <label class="col-sm-2 control-label">Price range</label>
                    <span style="display:inline-block;" class="col-lg-8">
                        <div id="slider-range"></div>
                        <label id="amount"></label>
                        <!-- <input type="text" id="amount" readonly style="border:0;"> -->
                        
                    </span>
                    <input type="hidden" name="amount_start" id="amount_start">
                    <input type="hidden" name="amount_end" id="amount_end">
                    
                    <br/>
                </div>
            </form>

            <div class="row panel panel-body" >
                @for( $i = 0; $i <= 6; $i++ )
                    <div class="col-lg-6 col-sm-6 col-xs-12" style="margin-bottom:30px;">
                        <a href="#">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active hovereffect">
                                        <img src="http://placehold.it/800x600" alt="Chania" height="345">
                                        <p>USD 150,000</p>
                                        <div class="overlay">
                                            <div class="panel panel-header">
                                                <h2>USD 150,000</h2>
                                                <p> Brand new 2 bedroom villa for sale in balangan</p>
                                            </div>
                                            <div class="pabel-body" style="min-height:220px;">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-barcode block m-b-xs"></i>
                                                        <span class="spanhover">Code</span><span class="spanhover">VL 123</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-map-marker block m-b-xs"></i>
                                                        <span class="spanhover">Location</span><span class="spanhover">Balangan</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-clock-o block m-b-xs"></i>
                                                        <span class="spanhover">Status</span><span class="spanhover">Leasehold / 19 Years</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-arrows-alt block m-b-xs"></i>
                                                        <span class="spanhover">Land Size</span><span class="spanhover">3.08 are</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-home block m-b-xs"></i>
                                                        <span class="spanhover">Building Size</span><span class="spanhover">105 sqm</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-bed block m-b-xs">&#xf236;</i>
                                                        <span class="spanhover">Bedrooms</span><span class="spanhover">2</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="hbox text-center text-sm panel-footer">
                                                <a href="" class="col-md-4">
                                                    <i class="fa fa-book block m-b-xs fa-2x"></i>
                                                    <span>Enquire</span>
                                                </a>
                                                <a href="" class="col-md-4">
                                                    <i class="fa fa-star block m-b-xs fa-2x"></i>
                                                    <span>Favorite</span>
                                                </a>
                                                <a href="" class="col-md-4">
                                                    <i class="fa fa-list block m-b-xs fa-2x"></i>
                                                    <span>Detail</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item hovereffect">
                                        <img src="http://placehold.it/800x600" alt="Chania" height="345">
                                        <div class="overlay">
                                           <h2>USD 150,000</h2>
                                        </div>
                                    </div>
                                    <div class="item hovereffect">
                                        <img src="http://placehold.it/800x600" alt="Chania" height="345">
                                        <div class="overlay">
                                           <h2>USD 150,000</h2>
                                        </div>
                                    </div>
                                    <div class="item hovereffect">
                                        <img src="http://placehold.it/800x600" alt="Chania" height="345">
                                        <div class="overlay">
                                           <h2>USD 150,000</h2>
                                        </div>
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
        <div id="map" class="panel panel-default col-lg-4"></div>
</section>
    

@endsection

@section('scripts')

<script>
    var markersToRemove = [];

    $(document).ready(function(){

        

        $(function() {
            $( "#tabs" ).tabs();
            $('.carousel').each(function(){
                $(this).carousel({
                    interval: false
                });
            });
        });

        var json = [
            {
                "st":"Pantai Kuta",
                "lat": -8.714309, 
                "lng": 115.168725,
                "price": 479000
            },
            {
                "st":"Hotel Pullman",
                "lat": -8.709664, 
                "lng": 115.167513,
                "price": 2147750
            }
        ];

        var json2 = [
            {
                "st":"Lazy bar & jungle",
                "lat": -8.710594, 
                "lng": 115.166912,
                "price": 1000000
            },
            {
                "st":"The Stones",
                "lat": -8.711178, 
                "lng": 115.167271,
                "price": 299510
            },
            {
                "st":"Bali Anggrek inn",
                "lat": -8.712295, 
                "lng": 115.167759,
                "price": 398000
            }
        ];

        // init map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: new google.maps.LatLng(-8.714309, 115.168725), //ambil dari parameter pertama search
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        //search
        var input = document.getElementById('searchTextField'),
            searchBox = new google.maps.places.SearchBox(input);

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

        var dots = {
            path: 'M 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 0,0 z',
            fillOpacity: 0,
            strokeWeight: 0
        };
        
        var infowindow = new google.maps.InfoWindow(),
            geocoder = new google.maps.Geocoder(),
            marker, i;

        removeMarkers();

        if (json.length > 0) {
            var i = 0;
            json.forEach(function (item) {
                marker = new MarkerWithLabel({
                    position: new google.maps.LatLng(item.lat, item.lng),
                    map: map,
                    icon: dots,
                    labelContent: "",
                    labelAnchor: new google.maps.Point(38, 29),
                    labelClass: "labelsmarker", // the CSS class for the label
                    labelStyle: {opacity: 0.75},
                    labelInBackground: false
                });

                marker.set("labelContent", "<div class='arrow'></div><div class='inner'><sup>Rp </sup>"+ item.price +"</div>");

                markersToRemove.push(marker);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent("<div style='color:#000;'>"+ item.st +"</div>");
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
                i++;
            });
        }
        
        // map on drag event
        google.maps.event.addListener(map,'dragend',function() {
            
            var centerMap = map.getCenter(),
                strCenter = centerMap.toString(),
                splCenter = strCenter.split(','),
                lats = splCenter[0].replace("(", ""), 
                longs = splCenter[1].replace(")", ""), 
                latlng = new google.maps.LatLng(lats, longs);

            //buat dapetin detail dari tempat (lat dan long
            geocoder.geocode(
                {'latLng': latlng}, 
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var add= results[0].formatted_address ;
                            var  value=add.split(",");

                            count=value.length;
                            country=value[count-1];
                            state=value[count-2];
                            city=value[count-3];
                            street=value[count-4];
                            console.log("street name is: " + street);
                            console.log("city name is: " + city);
                            console.log("province & postal code is: " + state);
                            console.log("country name is: " + country);
                        }
                        else  {
                            console.log("address not found");
                        }
                    }
                    else {
                        console.log("Geocoder failed due to: " + status);
                    }
                }
            );

            removeMarkers();
            
            if (json2.length > 0) {
                var i = 0;
                json2.forEach(function (item) {
                    marker = new MarkerWithLabel({
                        position: new google.maps.LatLng(item.lat, item.lng),
                        map: map,
                        icon: dots,
                        labelContent: "",
                        labelAnchor: new google.maps.Point(38, 29),
                        labelClass: "labelsmarker", // the CSS class for the label
                        labelStyle: {opacity: 0.75},
                        labelInBackground: false
                    });

                    marker.set("labelContent", "<div class='arrow'></div><div class='inner'><sup>Rp </sup>"+ item.price +"</div>");

                    markersToRemove.push(marker);

                    var a = new google.maps.LatLng(lats, longs),
                        b = new google.maps.LatLng(item.lat, item.lng);

                    console.log(calcDistance(a, b) + ' KM');

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                          infowindow.setContent("<div style='color:#000;'>"+ item.st +"</div>");
                          infowindow.open(map, marker);
                        }
                      })(marker, i));
                    i++;
                });
            }
        });
    });

    $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 5000,
            values: [ 500, 3000 ],
            slide: function( event, ui ) {
                $( "#amount" ).html( ui.values[ 0 ] + " $ - " + ui.values[ 1 ] + " $" );
                $("#amount_start").val( ui.values[ 0 ] );
                $("#amount_end").val( ui.values[ 1 ] );
            }
        });

        $("#slider-range").on("slidestop", function() {
            searching();
        });

        $( "#amount" ).html( $( "#slider-range" ).slider( "values", 0 ) + " $  - " + $( "#slider-range" ).slider( "values", 1 ) +  " $" );

        $("#amount_start").val( $( "#slider-range" ).slider( "values", 0 ) );
        $("#amount_end").val( $( "#slider-range" ).slider( "values", 1 ) );
    });

    //calculates distance between two points in km's
    function calcDistance(p1, p2) {
        return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
    }
    
    function removeMarkers() {
        for(var i = 0; i < markersToRemove.length; i++) {
            markersToRemove[i].setMap(null);
        }
    }

    function searching() {
        var srch = $("#searchTextField").val(),
            tipe = ($("#villa").prop("checked") == true) ? 'villa' : 'land',
            prices_from = $("#amount_start").val(),
            prices_to = $("#amount_end").val(),
            code = (tipe == 'villa') ? $("#villa-code").val() : $("#land-code").val(),
            status = (tipe == 'villa') ? $("#search-input-status-villa").val() : $("#search-input-status-land").val(),
            category = $("#search-input-category").val(),
            bedroom_from = $("#search-input-bedroomfrom").val(),
            bedroom_to = $("#search-input-bedroomto").val();
    }

</script>
@endsection
