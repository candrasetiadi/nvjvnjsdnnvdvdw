@extends('index')
@section('content')

<div class="bc-bg">
    <ul class="breadcrumb container">
        <li><a href="{{ baseUrl() }}">Home</a></li>
        <li><a href="{{ route('account', Lang::get('url')['account']) }}">Account</a></li>
        <li class="active">Wishlist</li>
    </ul>
</div>
<div class="line-top"></div>

<div class="container">
    <h3>WISHLIST</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>PROPERTY</th>
                <th>CREATED</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($wishlists as $wishlist)
            <tr>
                <td>
                    @if($wishlist->property->thumb())
                    <img width="150" src="{{ asset('uploads/property/' . $wishlist->property->thumb()->file) }}">
                    @else
                    <img width="150" src="{{ asset('no-image.png') }}">
                    @endif
                </td>
                <td><a href="{{ route('property.detail', str_slug($wishlist->property->lang()->title) . '-' . $wishlist->property->id) }}">{{ $wishlist->property->lang()->title }}</a></td>
                <td>{{ $wishlist->created_at->format('Y-m-d') }}</td>
                <td><a href="#" class="text-danger delete-wishlist" data-id="{{ $wishlist->id }}"><i class="fa fa-times-circle fa-2x"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="pull-right">
        {!! $wishlists->render() !!}
    </div>
</div>

@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        
        $('.delete-wishlist').click(function(event) {

            var question = 'Are you sure delete this item?';

            if(confirm(question)){

                var url = "{{ route('property.favorite.delete') }}";
                var id = $(this).attr('data-id');;
                var customerId = "{{ $customer->id }}";
                var token = "{{ csrf_token() }}";

                $.post(url, {id: id, customer_id: customerId, _token: token}, function(data, textStatus, xhr) {
                    
                    console.log(data);
                    if (data == 'deleted') location.reload();
                });

            }

            event.preventDefault();
        });
    });     
</script>
@stop