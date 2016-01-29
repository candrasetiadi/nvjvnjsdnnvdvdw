@extends('index')
@section('content')

<div class="container">
    <div class="row property-list">

        @foreach($properties as $property)
        <div class="col-md-4 list-item">

            <div class="thumbnail">
                @if(count($property->propertyFiles) > 0)
                <img src="{{ asset('uploads/property/' . $property->propertyFiles[0]->file) }}">
                @else
                <img src="{{ asset('no-image.png') }}">
                @endif

                <div class="caption">
                    <h3 class="list-item-title">{{ $property->lang()->title }}</h3>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

<div class="text-center">
    {!! $properties->render() !!}
</div>

@stop