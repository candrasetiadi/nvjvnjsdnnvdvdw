@extends('index')
@section('content')
<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="#">Home</a></li>
        <li class="active">Properties</li>
    </ul>
</div>
<div class="line-top"></div>
<div class="container">
    <div class="row list">

        @foreach($properties as $property)
        <div class="col-md-4 list-item">
            <a href="{{ route('property.' . $property->category->route, 
                [
                    $property->category->route => Lang::get('url')[$property->category->route],
                    'property' => str_slug($property->lang()->title) . '-' . $property->id

                ]) }}">

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
            </a>
        </div>
        @endforeach

    </div>
</div>

<div class="text-center">
    {!! $properties->render() !!}
</div>

@stop