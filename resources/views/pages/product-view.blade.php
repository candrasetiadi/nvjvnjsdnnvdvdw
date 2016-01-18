@extends('index')
@section('title', "$product->title")
@section('content')


<link rel="stylesheet" href="{{ asset('assets/phpcss/product-detail.css') }}">
<div class="content page-productdetail">
    <!-- SIDEBAR -->
    @include('fragments.sidebar')
    <!-- END SIDEBAR -->
    <div class="product-detail">
        <div class="product-detail-image">
            <img style="width: 100%;" src="{{ asset('media/catalog') . '/' . $product->thumbnail->file }}" alt="{{ $product->title }}">
            <div class="gallery-thumbnail-holder" style="overflow-x: hidden; height: 72px;">
                <div id="draggable" class="gallery-thumbnail-wrapper" style="display: flex; max-height: 100%;">
                    @foreach($product->gallery as $thumb)
                    <img class="clickable" src="{{ asset('media/catalog') . '/' . $thumb->file }}" alt="{{ $product->title }}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product-detail-desc">
            <div class="pos-absol">
                <h6 class="name">{{ $product->title }}</h6>
                <span class="attr">SKU: {{ $product->sku }}</span>
                @if(isset($product->description) AND $product->description != '')
                <p class="product-description">{{ ucfirst(trans('word.product_description')) }}:<br>{!! $product->description !!}</p>
                @endif
                <span class="arrow">
                    <a href="{{ baseUrl() . '/product-detail/' . $product->previousItem->url }}"><i class="icon-arrow_left"></i></a>
                    <a href="{{ baseUrl() . '/product-detail/' . $product->nextItem->url }}"><i class="icon-arrow_right"></i></a>
                </span>
            </div>
        </div>
        <div class="product-detail-table">
            {!! Form::open(array('id' => 'enquiry-form')) !!}
            <table id="hor-zebra">
                <thead>
                    <tr>
                        <th scope="col">{{ trans('description') }}</th>
                        <th style="text-align: center;" scope="col">{{ trans('size') }} (cm)</th>
                        <th style="text-align: center;" scope="col">{{ trans('size') }} (inch)</th>
                        <th scope="col" style="text-align: center;">{{ trans('quantity') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product->sizes as $size)
                    <tr>
                        <td>{{ $size->description }}</td>
                        <td style="text-align: center;">{{ $size->value }}</td>
                        <td style="text-align: center;">{{ convertToInches($size->value) }}</td>
                        <td style="text-align: center;">
                            <input class="item-qty" type="number" min="0" max="10" name="sizes[{{ $size->id }}]" value="0" style="max-width: 30px;text-align:center;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" name="" class="submit">add item to enquires list</button>
            {!! Form::close() !!}
        </div>

        <div class="related-products flexbox">

            <h3>{{ trans('word.related_items') }}</h3>
            @foreach($product->relatedItems as $related)
            <div class="related-item-wrapper">
                <a href="{{ baseUrl() . '/product-detail/' . $related->url }}">
                    <img class="related-item-img" src="{{ asset('media/catalog') . '/' . $related->thumbnail->file }}"/>
                    <div class="related-item-info">
                        <p class="related-item-title">{{ $related->title }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="related-products related-products-collection flexbox">

            <h3>{{ trans('word.similar_items') }}</h3>
            @foreach($product->similarItems as $similar)
            <div class="related-item-wrapper">
                <a href="{{ baseUrl() . '/product-detail/' . $similar->url }}">
                    <img class="related-item-img" src="{{ asset('media/catalog') . '/' . $similar->thumbnail->file }}"/>
                    <div class="related-item-info">
                        <p class="related-item-title">{{ $similar->title }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div><!-- END PRODUCT DETAIL -->
    <div class="product-detail-gallery-wrapper">

        <div class="product-detail-gallery-window">

            <a href class="product-detail-gallery-close"><i class="material-icons">close</i></a>

            <div class="product-detail-gallery-viewer" style="height: 100%;">
                <img src="{{ asset('media/catalog') . '/' . $product->thumbnail->file}}" alt="{{ $product->title }}" class="product-detail-gallery-img" style="max-width: 100%; max-height: 100%">
            </div>
        </div>
    </div>
</div><!-- END CONTENT -->
@stop

@section("scripts")
<script>
    $(window).resize(function() {

        var width = $('.related-item-wrapper').outerWidth();

        $('.related-item-wrapper').css({
            height: width
        });
    });

    $(document).on('click', '#view-more-products', function(e) {

        e.preventDefault();

        var page = $('.products-listing').attr('data-page');

        getCollection(((items * parseInt(page)) + 1), 24, false);

        $('#current-item-shown').html(24 * (parseInt(page) + 1));

        $('.products-listing').attr('data-page', (parseInt(page) + 1));
    });

    $(document).on('click', '.product-detail-gallery-close', function(e) {

        e.preventDefault();

        $('.product-detail-gallery-wrapper').removeClass('active');
    });

    $(document).on('click', '.clickable', function() {

        $('.product-detail-gallery-viewer img').attr('src', $(this).attr('src'));

        $('.product-detail-gallery-wrapper').addClass('active');
    });

    $(function () {
        $("#draggable").draggable({
            scroll: true,
            snap: true,
            axis: 'x',
            drag: function( event, ui ) {
                var leftLimit = $('.gallery-thumbnail-holder').offset().left;
                console.log($(this).offset().left);
                console.log($(this).parent().offset().left);

                if($(this).offset().left < leftLimit) {

                }
            }
        });
    });

    $(document).on('submit', '#enquiry-form', function(e) {

        e.preventDefault();

        showLoader();

        fd = new FormData($('#enquiry-form')[0]);

        $.ajax({

            url: '/system/ajax/cart/add',

            type: 'POST',

            data: fd,

            dataType: 'json',

            processData: false,

            contentType: false,

            async: true,

            error: function(xhr, status, message){

            console.log(xhr);

            console.log(status);

            console.log(message);

        }}).done(function(data) {

            switch(data.status) {

                case 501:

                    alert(data.message);

                    window.location.href = '{{ baseUrl() }}/{{ trans('url.login') }}';

                    return false;
            }

            console.log(data);

            checkoutOpt();
        });
    });

    function showLoader() {

        var loader = '<div class="popout-checkout">';
        loader += '<p>Adding items to list</p>';
        loader += '</div>';

        $('body').append(loader);
    }

    function checkoutOpt() {

        $('.popout-checkout').remove();

        var prompt = '<div class="popout-checkout">';
        prompt += '<span id="popout-wrapper">';
        prompt += '<p>Item(s) has been added to list!</p>';
        prompt += '<a href class="popout-button" id="popout-close">{{ trans('word.continue_shopping') }}</a><a href="{{ baseUrl() . '/' . trans('url.checkout') }}" class="popout-button" id="popout-checkout">{{ trans('word.checkout') }}</a>';
        prompt += '</span></div>';

        $('body').append(prompt);
    }

    $(document).on('click', '.popout-button', function(e) {

        console.log('CLICK');

        e.preventDefault();

        if($(this).attr('id') == 'popout-close') {

            $('.popout-checkout').remove();

            return false;

        } else {

            window.location.href = '{{ baseUrl() . '/' . trans('url.checkout') }}';
        }
    });

</script>
@stop
