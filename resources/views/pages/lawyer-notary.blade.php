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
			<li class="active"><a href data-target="#visa-categories" data-toggle="tab"><h4>Visa Categories</h4></a></li>
			<li><a href data-target="#services-of-notary" data-toggle="tab"><h4>Services of Notary</h4></a></li>
			<li><a href data-target="#services-of-lawyer" data-toggle="tab"><h4>Services of Lawyer</h4></a></li>
		</ul>

		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="visa-categories">
				<div class="row">
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#social-culture-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/social-culture-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>social & culture visa</h4><h4><small>valid for 6 month</small></h4></span>
						</a>
					</div>
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#retirement-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/retirement-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>retirement visa</h4>
							<h4><small>valid for 1 (one) year</small></h4></span>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#single-entry-business" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/single-entry-business-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>single entry business visa</h4>
							<h4><small>valid for 6 month</small></h4></span>
						</a>
					</div>
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/multiple-entry-business-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>multiple entry business visa</h4>
							<h4><small>valid for 12 month</small></h4>	</span>
						</a>
					</div>
					
					
				</div>	
				<div class="row">
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#family-kitas" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/icon-family-kitas.png" class="icon-circl">
							<span style="display:inline-block;"><h4>family kitas</h4>
							<h4><small>valid for 1 (one) year</small></h4></span>
						</a>
					</div>
					
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/working-visa-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>working visa kitas</h4>
							<h4><small>valid for 1 (one) year</small></h4></span>
						</a>
					</div>
				</div>			
				<div class="row">
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/epo-icon.png" class="icon-circl">
							<span style="display:inline-block;"><h4>epo (exit permit only)</h4>
							<small>&nbsp;</small></span>
						</a>
					</div>
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/icon-pma.png" class="icon-circl">
							<span style="display:inline-block;"><h4>pma (foreign investment company)</h4>
							<h4><small>Starts from USD 3,600.00</small></h4></span>
						</a>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/icon-local-company-pt.png" class="icon-circl">
							<span style="display:inline-block;"><h4>local company (pt)</h4>
							<h4><small>Starts from USD 1,800.00</small></h4>	</span>
						</a>
					</div>
					<div class="col-md-6 col-md-offset ">
						<a href data-target="#multiple-entry-business-visa" data-toggle="tab" style="text-decoration:none;">
							<img src="assets/img/visa_categories/icon-imb.png" class="icon-circl">
							<span style="display:inline-block;"><h4>imb (building permit)</h4>
							<small>&nbsp;</small></span>
						</a>
					</div>
				</div>					
			</div>
			<div class="tab-pane fade" id="services-of-notary">
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>NOTARY CONSULTATION</h4>
							<p><span class="text-blue">USD 70.00</span> You can have consultation with our partner, public notary on creating a business or investment and every aspect of state legal documents</p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>COMPANY DEED</h4>
							<p><span class="text-blue">Starts from USD 1,800.00</span> Made by our partner, public notary. This deed is one of the requirements to starts a new business/ company.</p>
						</blockquote>
					</div>
						
				</div>
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>AMENDEMENTS OF COMPANY DEED</h4>
							<p><span class="text-blue">Starts from USD 1,700.00</span> Made by our partner, public notary. This Amendment is to be made if you want to make changes in your company deed.</p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>DUE DILIGENCE</h4>
							<p><span class="text-blue">Starts from USD 250.00</span> Is an investigation legal document prior to signing a contract, or an act with a certain standard of care.</p>
						</blockquote>
					</div>
						
				</div>
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>PURCHASED LEASEHOLD PROPERTY</h4>
							<p><span class="text-blue">Starts from USD 300.00</span> This is a package of notary service includes due diligence of the property and purchased deed.</p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>PURCHASED FREEHOLD PROPERTY</h4>
							<p><span class="text-blue">Starts from 1% of purchased price</span> This is a package of notary service includes due diligence of the property and purchased deed.</p>
						</blockquote>
					</div>
						
				</div>
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>DEED OF GRANTING MORTGAGE</h4>
							<p><span class="text-blue">Starts from 1% of the mortgage value</span> Put in mortgage on title deed of a land.</p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>ROYA</h4>
							<p><span class="text-blue">Starts from USD 150.00</span> Write off mortgage.</p>
						</blockquote>
					</div>
						
				</div>
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>POWER OF ATTORNEY</h4>
							<p><span class="text-blue">USD 50.00</span> </p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>LEGALIZE INVENTORY</h4>
							<p><span class="text-blue">USD 250.00</span></p>
						</blockquote>
					</div>
						
				</div>
				<div class="row">
					<div class="col-md-6 ">
						<blockquote>
							<h4>LEGALIZATION DOCUMENT</h4>
							<p><span class="text-blue">USD 150.00</span> </p>
						</blockquote>
					</div>
					<div class="col-md-6 ">
						<blockquote>
							<h4>WATERMARK DOCUMENT</h4>
							<p><span class="text-blue">USD 250.00</span></p>
						</blockquote>
					</div>
						
				</div>
				
			</div>
			<div class="tab-pane fade" id="services-of-lawyer">
				<div class="row">
					<div class="col-lg-6">
						
					</div>
					<div class="col-lg-6">
						
					</div>
				</div>
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