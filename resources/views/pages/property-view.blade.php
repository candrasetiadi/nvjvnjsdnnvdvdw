@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li class="active">{{ $property->lang()->title }}</li>
    </ul>
</div>
<div class="line-top"><h3><small>{{ $property->lang()->title }}</small></h3></div>

<div class="container">
    <div class="row detail">

        <div class="col-md-8">

            <div class="thumbnail nohovereffect">
                @if(count($property->propertyFiles) > 0)
                <img src="{{ asset('uploads/property/' . $property->propertyFiles[0]->file) }}">
                <p for=""><span class="currency">{!! \Config::get('currency') !!}</span> {{ number_format($property->price, 2) }}</p>
                @else
                <img src="{{ asset('no-image.png') }}">
                <p for=""><span class="currency">{!! \Config::get('currency') !!}</span> {{ number_format($property->price, 2) }}</p>
                @endif

                
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Description</div>
                <div class="panel-body">
                    {{ $property->lang()->description }}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Facilities</div>

                <ul class="list-group">

                    @foreach($property->facilities as $facility)
                    <li class="list-group-item">
                        <span class="badge">{{ $facility->description }}</span>
                        {{ $facility->name }}
                    </li>
                    @endforeach

                </ul>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Distances</div>

                <ul class="list-group">

                    @foreach($property->distances as $distance)
                    <li class="list-group-item">
                        <span class="badge">{{ $distance->value }} {{ $distance->unit }}</span>
                        {{ $distance->from }}
                    </li>
                    @endforeach

                </ul>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Details</div>

                <ul class="list-group">
                   
                    <li class="list-group-item">
                        <span class="badge">{{ $property->land_size }} m2</span>
                        Land:
                    </li>
                   
                    <li class="list-group-item">
                        <span class="badge">{{ $property->building_size }} m2</span>
                        Building:
                    </li>

                </ul>
            </div>
            
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <span class="currency "><sup>{!! \Config::get('currency') !!} </sup> {{ number_format($property->price, 2) }} </span> 
                </div>
                <div class="panel-body">
                    <div class="" >
                        <div class="col-lg-12" style="padding-bottom: 20px;">
                            <a href="#" class="btn btn-primary btn-lg btn-block">Inquire this property</a>
                        </div>
                    </div>
                    <br>
                    <div class=" text-center" >
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-default fa fa-print"> Print PDF</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="#" class="btn btn-default fa fa-heart-o"> Favorites</a>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>

    </div>
</div>


@stop