@extends('index')
@section('content')
<style type="text/css">
    body header {
        background: #fff none repeat scroll 0 0;
        position: relative;
        width: 100%;
        z-index: 9999;
    }

    @media only screen and (max-width: 980px) {
        #map{
            visibility: hidden;

        }
    }

    #map{
        width: 40%; 
        height: 1000px;
        display: inline-block;

    }
    label{
        color:#000;
    }

    .labelsmarker {
        mirgin-top:-3px;
        padding: 5px;
        position: absolute;
        visibility: visible;
        z-index: 1030;
    }
    .labelsmarker .arrow{
        border-top-color: #000000;
        border-right-color: rgba(0,0,0,0);
        border-bottom-color: rgba(0,0,0,0);
        border-left-color: rgba(0,0,0,0);
        border-width: 5px 5px 0;
        bottom: 0;
        left: 50%;
        margin-left: -5px;
        border-style: solid;
        height: 0;
        position: absolute;
        width: 0;
    }
    .labelsmarker .inner{
        background-color: #000000;
        border-radius: 4px;
        color: #FFFFFF;
        max-width: 200px;
        padding: 3px 8px;
        text-align: center;
        text-decoration: none;  
    }
</style>
<!-- MAIN CONTAINER -->
<section id="container">
    <div class="flexbox justify-between">

        <div style="width:60%; height:500px; margin:10px;">
            <div>
                <label>&nbsp;</label>
                <input id="searchTextField" type="text" value="" placeholder="SEARCH" onChange="searching()"> 
            </div>
            <br>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-villa">Villa For Sale</a></li>
                    <li><a href="#tabs-land">Land For Sale</a></li>
                </ul>
                <div id="tabs-villa">
                    <!-- <h3 class="input-group-title">Villa For Sale</h3> -->
                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                        <label>Status</label>
                            <select id="search-input-status-villa" class="villa-input" name="status" onChange="searching()">
                                <option value="0" selected>--any--</option>
                                <option value="1" >Freehold</option>
                                <option value="2">Leasehold</option>
                            </select>
                        </div>
                        
                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                        <label>Category</label>
                            <select id="search-input-category" class="villa-input" name="category" onChange="searching()">
                                <option value="0" selected>--any--</option>
                                <option value="1" >Beachfront Property</option>
                                <option value="2" >Home And Retirement</option>
                                <option value="3" >Hot Deals</option>
                                <option value="4" >Investment More Than $ 500000</option>
                                <option value="5" >Investment Until $ 500000</option>
                            </select>
                        </div>
                        
                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                        <label>Bedroom From</label>
                            <select id="search-input-bedroomfrom" class="villa-input" name="bedroomfrom" onChange="searching()">
                                @for($i = 1; $i <= 15; $i++)
                                    <option value="{{ $i }}" {{ ($i == 1) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                        <label>Bedroom To</label>
                            <select id="search-input-bedroomto" class="villa-input" name="bedroomto" onChange="searching()">
                                @for($i = 1; $i <= 15; $i++)
                                    <option value="{{ $i }}" {{ ($i == 15) ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <br/>
                    <div class="m-input-wrapper w50-6">
                        <label>Villa Code</label>
                        <input id="villa-code" type="text" value="" onChange="searching()"> 
                    </div>

                </div>
                <div id="tabs-land">
                    <!-- <h3 class="input-group-title">Land For Sale</h3> -->
                    <div class="m-input-wrapper m-input-wrapper-select w25-9">
                        <label>Status</label>
                        <select id="search-input-status-land" class="land-input" name="status" onChange="searching()">
                            <option value="0" selected>--any--</option>
                            <option value="1" >Freehold</option>
                            <option value="2">Leasehold</option>
                        </select>
                    </div>
                    <br/>
                    <div class="m-input-wrapper w50-6">
                        <label>Land Code</label>
                        <input id="land-code" type="text" value="" onChange="searching()"> 
                    </div>
                </div>
                <div class="m-input-wrapper w50-6" style="margin:20px;">
                    <label >Price range</label>
                    <input type="text" id="amount" readonly style="border:0;">
                    <input type="hidden" name="amount_start" id="amount_start">
                    <input type="hidden" name="amount_end" id="amount_end">
                    <div id="slider-range"></div>
                    <br/>
                </div>
            </div>
        </div>
        <div id="map"></div>
    </div>
    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
        
    </div>


</section>

@endsection

@section('scripts')

<script>
    var markersToRemove = [];

    $(document).ready(function(){

        $(function() {
            $( "#tabs" ).tabs();
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
            max: 15000000,
            values: [ 1500000, 7000000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "Rp. " + number_format( ui.values[ 0 ], 0, ',', '.' ) + " - Rp. " + number_format( ui.values[ 1 ], 0, ',', '.' ) );
                $("#amount_start").val( ui.values[ 0 ] );
                $("#amount_end").val( ui.values[ 1 ] );
            }
        });

        $("#slider-range").on("slidestop", function() {
            searching();
        });

        $( "#amount" ).val( "Rp. " + number_format( ($( "#slider-range" ).slider( "values", 0 )), 0, ',', '.') + " - Rp. " + number_format( ($( "#slider-range" ).slider( "values", 1 ) ), 0, ',', '.'));

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

    function number_format(number, decimals, dec_point, thousands_sep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');

        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k)
                .toFixed(prec);
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
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
