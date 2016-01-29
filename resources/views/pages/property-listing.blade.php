@extends('index')
@section('content')

<div class="container">
    <div class="row">

        @foreach($properties as $property)
        <div class="col-md-3">

            <div class="thumbnail">
                @if(count($property->propertyFiles) > 0)
                <img src="{{ asset('uploads/property/' . $property->propertyFiles[0]->file) }}">
                @else
                <img src="http://placehold.it/400x300">
                @endif

                <div class="caption">
                    <h3>{{ $property->lang()->title }}</h3>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

@include('admin.fragments.pagination', ['paginator' => $properties])

@stop