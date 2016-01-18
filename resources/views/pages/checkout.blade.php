@extends('index')
<?php $title = trans('word.checkout') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/checkout.css') }}">

<section class="checkout">

    <h1 class="title_page">{{ strtoupper(trans('word.checkout')) }}</h1>

    <div class="cart-content">

        @foreach($cartcontent as $product)
        <div class="cart-item flexbox flexbox-wrap" data-sku="{{ $product->sku }}">
            <div class="img-holder">
                <img src="{{ asset('media/catalog') . '/' . $product->thumbnail->file }}" alt="{{ $product->title }}">
            </div>

            <div class="description-table">
                <p class="product-title">{{ $product->title }}</p>
                <table>
                    <tr>
                        <td width="30%">Size Description</td>
                        <td width="25%">Size cm</td>
                        <td width="25%">Size Inch</td>
                        <td width="10%">Qty</td>
                        <td width="10%">Remove</td>
                    </tr>
                    @foreach($product->items as $item)
                    <tr class="product-description">
                        <td class="size-desc-view">{{ $item->description }}</td>
                        <td>{{ $item->value }}</td>
                        <td>{{ $item->value }}</td>
                        <td class="item-quantity-view"><input type="number" value="{{ $item->qty }}" min="0" max="10"></td>
                        <td><a href="{{ baseUrl() }}/system/ajax/enquiry/remove/{{ $item->id }}" class="delete-cart-item">REMOVE</a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        @endforeach
    </div>

    <p style="margin-top: 48px; color: #bc121d;">Our price list is very long and complex due to the large amount of products, wood types and finishes. Please send us maximum of 10 items in your enquiry.</p>

    <h1 class="title_page" style="margin-top:60px;">submit enquiry</h1>

    {!! Form::open(array('id' => 'checkout-form-new', 'style' => 'margin-bottom: 32px;')) !!}
    <div class="checkout-form-group flexbox flexbox-wrap">

        <div class="input-wrapper">
            <label for="checkout-name">name</label>
            <input disabled type="text" name="name" value="{{ $customer->name or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">address</label>
            <input type="text" name="address" value="{{ $customer->address or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">city</label>
            <input type="text" name="city" value="{{ $customer->city or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">state/province</label>
            <input type="text" name="province" value="{{ $customer->state or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">zip/postal</label>
            <input type="text" name="postal" value="{{ $customer->postal or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">country</label>
            <input type="text" name="country" value="{{ $customer->country or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">phone/fax</label>
            <input type="text" name="phone" value="{{ $customer->phone or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">website</label>
            <input type="text" name="web" value="{{ $customer->website or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">email</label>
            <input type="text" name="email" value="{{ $customer->email or '' }}">
        </div>

        <div class="input-wrapper">
            <label for="checkout-name">shipping destination</label>
            <input type="text" name="destination" value="{{ $customer->country or '' }}">
        </div>

        <div class="input-wrapper full">
            <label for="checkout-name">additional notes</label>
            <textarea name="note"></textarea>
        </div>



        <div class="input-wrapper third">
            <label for="checkout-name">request shipping price</label>
            <input type="checkbox" name="shipping_price">
        </div>

        <div class="input-wrapper third">
            <label for="checkout-name">request shipping time</label>
            <input type="checkbox" name="shipping_time">
        </div>

        <div class="input-wrapper third">
            <label for="checkout-name">request item price</label>
            <input type="checkbox" name="request_price">
        </div>
    </div>

    <input type="submit" value="submit" id="checkout-submit">
    {!! Form::close() !!}

</section>

@stop

@section("scripts")

<script>

    $(document).on('submit', '#checkout-form-new', function(e) {

        e.preventDefault();

        var fd = new FormData($('#checkout-form-new')[0]);

        $.ajax({

            url: "/system/ajax/enquiry/post",

            type: "POST",

            data: fd,

            processData: false,  // tell jQuery not to process the data. IMPORTANT for file upload.

            contentType: false,   // tell jQuery not to set contentType. IMPORTANT for file upload.

            error: function(xhr, status, message){

                console.log(xhr);

                console.log(status);

                console.log(message);

            }}).done(function(data) {

            switch(data.status) {

                case 200:

                    alert(data.message);

                    window.location.href = '{{ baseUrl() }}';

                    break;

                default:

                    alert(data.message);
            }
        });
    });

</script>

@stop
