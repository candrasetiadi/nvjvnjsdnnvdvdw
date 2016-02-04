@extends('index')
@section('content')
<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">{{ ucfirst($titles) }}</li>
    </ul>
</div>
<div class="line-top"><h3><small>{{ $titles }}</small></h3></div>
<div class="container">
	<br>
	<div class="tab-container">
		<ul class="nav nav-tabs">
			<li class="active"><a href data-target="#visa-categories" data-toggle="tab"><h4><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Visa Categories</h4></a></li>
			<li><a href data-target="#services-of-notary" data-toggle="tab"><h4>Services of Notary</h4></a></li>
			<li><a href data-target="#services-of-lawyer" data-toggle="tab"><h4>Services of Lawyer</h4></a></li>
		</ul>

		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="visa-categories">
				<div class="row">
					<div class="col-md-4">
						<a href data-target="#social-culture-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/social-culture-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>social & culture visa</h4><h4><small>valid for 6 month</small></h4></span>
						</a>
					</div>
					<div class="col-md-4">
						<a href data-target="#single-entry-business" data-toggle="tab" style="text-decoration:none;">
							<h4>single entry business</h4>
							<h4><small>valid for 6 month</small></h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<h4>single entry business</h4>
							<h4><small>valid for 6 month</small></h4>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<a href data-target="#retirement-visa" data-toggle="tab" style="text-decoration:none;">
							<h4>retirement visa</h4>
							<h4><small>valid for 1 (one) year</small></h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href data-target="#family-kitas" data-toggle="tab" style="text-decoration:none;">
							<h4>family kitas</h4>
							<h4><small>valid for 1 (one) year</small></h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<h4>single entry business</h4>
							<h4><small>valid for 6 month</small></h4>
						</a>
					</div>
				</div>				
			</div>
			<div class="tab-pane fade" id="services-of-notary">
				
			</div>
			<div class="tab-pane fade" id="services-of-lawyer">
				
			</div>

			<!-- sub tab -->
			<div class="tab-pane fade" id="social-culture-visa">
				<a href data-target="#visa-categories" data-toggle="tab" class="fa fa-arrow-circle-left"></a><br>
				social & culture visa

			</div>
			<div class="tab-pane fade" id="single-entry-business">
				single entry business
			</div>
			<div class="tab-pane fade" id="multiple-entry-business-visa">
				multiple entry business
			</div>
			<div class="tab-pane fade" id="retirement-visa">
				retirement visa
			</div>
			<div class="tab-pane fade" id="family-kitas">
				family kitas
			</div>
		</div>
	</div>

</div>	

@stop