@extends('index')
<?php $title = trans('word.products') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/products.css') }}">
<div class="content">

    @include('fragments.sidebar')

    @if(isset($search))
    <h3>Search results for "{{ $search }}"</h3>
    @else
    <h3>Products in Catalog</h3>
    @endif
    <div class="products-listing" style="margin-top: 24px; overflow: hidden;" data-page="1" data-sort="DESC">

        @if(count($products) != 0)
        @foreach($products as $product)
        <div class="product-box">
            <div class="product-box-img">
                <img src="{{ asset('media/catalog') . '/' . $product->thumbnail->file }}" class="img-responsive" alt="{{ $product->title }}">
            </div>
            <div class="product-box-desc">
                <div class="product-desc-position">
                    <span class="product-name"><a href="{{ baseUrl() . '/product-detail/' . $product->url }}">{{ $product->title }}</a></span>
                    <span class="product-size">{{ $product->sku }}</span>
                    <span class="product-link"><a href="{{ baseUrl() . '/product-detail/' . $product->url }}">{{ trans('word.view') }}</a></span>
                </div>
            </div>
        </div>
        @endforeach

        @if(!isset($search) AND count($products) > 48)
        <a href data-start="1" data-limit="48" class="products-load-more">{{ trans('word.load_more') }}</a>
        @endif
        @else

        <p>No subcategories in this category yet.</p>

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

</script>
@stop
