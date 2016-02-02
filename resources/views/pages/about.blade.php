@extends('index')
@section('content')

<div class="bs-component">
    <ul class="breadcrumb">
        <li><a href="{{ url() }}">Home</a></li>
        <li class="active">About</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">
    <h3>ABOUT</h3>
</div>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
