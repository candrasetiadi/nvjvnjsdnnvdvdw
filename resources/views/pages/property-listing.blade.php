@extends('index')
@section('content')

<style type="text/css">

    .property-wrapper {
        padding-top: 200px;
    }

    .property-wrapper .property-item {
        width: 30%;
        float: left;
    }
</style>

<div id="main">

    <div class="property-wrapper">

        @foreach($properties as $property)
        <div class="property-item">
            <h3>{{ $property->lang()->title }}</h3>
        </div>
        @endforeach

    </div>

</div>

@include('admin.fragments.pagination', ['paginator' => $properties])

@stop