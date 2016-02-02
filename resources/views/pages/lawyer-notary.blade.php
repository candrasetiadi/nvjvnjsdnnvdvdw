@extends('index')
@section('content')
<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">Lawyer & Notary</li>
    </ul>
</div>
<div class="line-top"></div>
<div class="container">

    <h3>LAWYER & NOTARY</h3>
    <div class="row">
    	<div class="col-lg-4">
    		<h3>Visa Categories</h3>
    	</div>
    	<div class="col-lg-4">
    		<h3>Services Of Notary</h3>
    	</div>
    	<div class="col-lg-4">
    		<h3>Services Of Lawyer</h3>
    	</div>
    </div>

</div>

@stop