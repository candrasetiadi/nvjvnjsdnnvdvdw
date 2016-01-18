@extends('index')
<?php $title = trans('word.products') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/products.css') }}">
<div class="content">

    @include('fragments.sidebar')

    <h3>Products in Catalog</h3>
    <div class="products-listing" style="margin-top: 24px; overflow: hidden;" data-page="1" data-sort="DESC">

        @if(count($categories) != 0)
        @foreach($categories as $category)
        <a href="{{ baseUrl() . '/' . trans('category') . '/' . $category->data->url }}" class="category-box-link">
            <div class="category-box">
                <div class="category-box-img" style="background-image: url('{{ url() . '/media/categories/' . $category->thumbnail }}');"></div>
                <p class="category-box-title">{{ $category->data->title }}</p>
            </div>
        </a>
        @endforeach
        @else

        <p>No categories in this group yet.</p>

        @endif
    </div>
</div>
@stop

@section('scripts')
<script>
    var blockH, items, sortOrder;

    $(document).ready(function() {

        items = 24;

        sortOrder = $('.products-listing').attr('data-sort');
    });

    /*
    $(document).on('click', '#view-more-products', function(e) {

        e.preventDefault();

        var page = $('.products-listing').attr('data-page');

        getCollection(((items * parseInt(page)) + 1), 24, false);

        $('#current-item-shown').html(24 * (parseInt(page) + 1));

        $('.products-listing').attr('data-page', (parseInt(page) + 1));
    });

    function getCollection(start, limit, meth) {

        return $.ajax({

            url: baseUrl + 'matter/app/AjaxInterface.php',

            type: 'POST',

            data: {access_db: 1, method: 'range', database: 'catalog', start: start, limit: limit, order: sortOrder},

            dataType: 'json',

            async: true,

            error: function(xhr, status, message){

            console.log(xhr);

            console.log(status);

            console.log(message);

        }}).done(function(data) {

            var products = '';

            $.each(data, function(key, value) {

                products += '<div class="product-box">';
                products += '<div class="product-box-img">';
                products += '<img src="{{ asset('media/catalog') }}/' + value.image + '" class="img-responsive">';
                products += '</div>';
                products += '<div class="product-box-desc">';
                products += '<div class="product-desc-position">';
                products += '<span class="product-name"><a href="{{ baseUrl() . '/' . trans('product_detail') }}/' + value.id + '/' + value.slug + '/">' + value.title + '</a></span>';
                products += '<span class="product-size">' + value.sku + '</span>';
                products += '<span class="product-link"><a href="{{ baseUrl() . '/' . trans('product_detail') }}/' + value.id + '/' + value.slug + '/">{{ trans('word.view') }}</a></span>';
                products += '</div>';
                products += '</div>';
                products += '</div>';

            });

            switch(meth) {

                case true:

                    $('.products-listing').html(products);

                    break;

                default:

                    $('.products-listing').append(products);
            }
        });
    }
    */

</script>
@stop
