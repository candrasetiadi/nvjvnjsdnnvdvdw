@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Contact</li>
    </ul>
</div>
<div class="line-top"></div>
<div class="container">
    <h3>CONTACT</h3>
    <div class="row">
    	<div class="col-lg-12 bs-component" style="height:340px;">
	    	<div id="googleMap" style="width:100%;height:300px;"></div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-lg-6 bs-component">
    		<div class="panel panel-primary">
				<div class="panel-heading">
                  	<h3 class="panel-title">Fill the form</h3>
                </div>
	    		<form class="panel-body">
	    			<div class="form-group">
	    				<label for="firstname" class="col-lg-12 ">Full Name</label>
	                    <div class="col-lg-6">
	                      	<input type="text" class="" id="firstname" placeholder="First Name">
	                    </div>
	                    <div class="col-lg-6">
	                      	<input type="text" class="" id="lastname" placeholder="Last Name">
	                    </div>
	    			</div>
	    			<div class="form-group">
	                    <label for="inputEmail" class="col-lg-12 ">Email</label>
	                    <div class="col-lg-12">
	                    	<input type="text" class="" id="inputEmail" placeholder="Email">
	                    </div>
                  	</div>
                  	<div class="form-group">
	                    <label for="msg" class="col-lg-12 ">Your Message</label>
	                    <div class="col-lg-12">
	                    	<textarea class="" rows="7" id="msg"></textarea>
	                    </div>
                  	</div>
                  	<div class="form-group">
                  		<div class="g-recaptcha" data-sitekey="6LcdHRcTAAAAAMUKsjZDzArdb0e8Fk2HU-duNhJP" style=" margin-left: 20px; margin-top: 350px;"></div>
                  		<!-- reCAPTCHA secret : 6LcdHRcTAAAAANdDPV40G9bgBMdW8EyJnYnrVuUQ -->
                  	</div>
                  	<div class="form-group">
	                    <div class="col-lg-12">
		                      <button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
	                 </div>
	    		</form>
	    	</div>
    	</div>
    	<div class="col-lg-6 ">
    		<div class="well bs-component">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="thumbnail">
	    					<img src="{{ asset('assets/img/photo.jpg') }}">
	    				</div>
	    			</div>
	    			<div class="col-lg-3"><strong>Address</strong></div><div class="col-lg-9">: Jalan Petitenget No.9, Badung, Bali 80361</div>
	    			<div class="col-lg-3"><strong>Phone</strong></div><div class="col-lg-9">: (0361) 4741212 </div>
	    			<div class="col-lg-3"><strong>Email</strong></div><div class="col-lg-9">: contact@kibarerproperty.com</div>
	    		</div>
	    		<div class="row" style="text-align:center;">
	    			
	    			<hr>
	    			Our Local phone numbers :<br>
					<strong>Australia</strong> : +61 865 558 999 , <strong>UK</strong> : +44 203 514 2999<br>
					<strong>Germany</strong> : +49 893 803 875 , <strong>South Africa</strong> : +27 213 002 088<br>
					<strong>Hong Kong</strong> : +852 5808 4180 , <strong>USA</strong> : +1 518 574 2272<br>
	    		</div>
	    	</div>
    	</div>
    </div>
</div>


@endsection

@section('scripts')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript">
		var myCenter=new google.maps.LatLng(-8.6714246,115.1607031);

		function initialize() {
			var mapProp = {
				center:myCenter,
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker=new google.maps.Marker({
		  		position:myCenter,
		  	});

			marker.setMap(map);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
@endsection