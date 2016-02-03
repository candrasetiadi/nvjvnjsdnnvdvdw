@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ url() }}">Home</a></li>
        <li class="active">{{ $titles }}</li>
    </ul>
</div>
<div class="line-top"><h3><small>{{ $titles }}</small></h3></div>

<div class="container">
    <h3>ABOUT</h3>
</div>

@endsection

@section('scripts')
<script>
    Kibarer.home();
</script>
@endsection
