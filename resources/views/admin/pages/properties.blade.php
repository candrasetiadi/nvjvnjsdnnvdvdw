@extends('admin.master')
@section('page', 'properties')

@section('fab')

<m-fab salmon class="modal-open" data-target="#properties-add"><i class="material-icons">add</i></m-fab>

<!--
<div class="small-fab-wrapper sub-fab-wrapper">
<a class="fab-button fab-button-small shadow-hover modal-open" data-target="#properties-add">
<i class="material-icons">business</i>
<span class="drop-fab-hint">add properties</span>
</a>

<a class="fab-button fab-button-small shadow-hover modal-open" data-target="#land-add">
<i class="material-icons">event</i>
<span class="drop-fab-hint">add land</span>
</a>
</div>
-->

@stop

@section('content')
<div class="property-wrapper flexbox flexbox-wrap">

    <table class="m-table-list property-table">
        <thead>
            <td><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td>Image</td>
            <td>Created</td>
            <td>Code</td>
            <td>Title</td>
            <td>Type</td>
            <td>Category</td>
            <td>Publish</td>
            <td>Agent</td>
            <td>Price</td>
            <td>View</td>
            <td>Action</td>

        </thead>
        <tbody>
            @foreach($properties as $property)
            <?php $images = $property->propertyFiles()->where('type', 'image'); ?>
            <tr class="property-item" data-id="{{ $property->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="image">{!! ($images->count() > 0) ? '<a href="'. asset('uploads/property/' . $images->first()->file) . '"></a>' : '-'; !!}</td>
                <td class="created_at">{{ $property->created_at }}</td>
                <td class="code">{{ $property->code }}</td>
                <td class="title">{{ $property->lang()->title }}</td>
                <td class="type">{{ ucwords($property->type) }}</td>
                <td class="type">{{ ucwords($property->categoryName()) }}</td>
                <td class="publish">{{ ucfirst($property->publish) }}</td>
                <td class="view">{{ $property->user->firstname }}</td>
                <td class="price align-right">{{ number_format($property->price, 2) }}</td>
                <td class="view align-right">{{ $property->view }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="{{ $property->id }}"><ul>
                        <li><a href="{{ $property->id }}" class="item-edit">edit</a></li>
                        <li><a href="/system/ajax/blog/delete/{{ $property->id }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@include('admin.fragments.pagination', ['paginator' => $properties])

@endsection

@section('modal')

<m-modal-wrapper id="properties-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'properties-form', 'data-function' => 'modalClose', 'data-url' => 'property/store')) !!}
    <h3>Add Property</h3>
    <m-caroussel>

        <m-caroussel-header class="flexbox justify-end">
            <m-caroussel-switch-wrapper class="flexbox">
                <?php $numberOfSlides = 5 ?>
                <m-caroussel-switch class="active">detail</m-caroussel-switch>
                <m-caroussel-switch>facilities</m-caroussel-switch>
                <m-caroussel-switch>distance</m-caroussel-switch>
                <m-caroussel-switch>gallery</m-caroussel-switch>
                <m-caroussel-switch>owner</m-caroussel-switch>
            </m-caroussel-switch-wrapper>
        </m-caroussel-header>

        <m-caroussel-body>
            <m-caroussel-slider class="flexbox align-start" style="width: <?= $numberOfSlides ?>00%;">

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-general" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox justify-between">
                        <div class="m-input-wrapper w50-6">
                            <input url-format data-target="#properties-input-url" type="text" name="title" id="properties-input-title" required>
                            <label for="title">title</label>
                        </div>

                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="slug" id="properties-input-url" required>
                            <label for="slug">url</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">General Information</h3>
                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="blog-input-lang" name="status" required>
                                <option value="1" selected>available</option>
                                <option value="0">unavailable</option>
                                <option value="-1">hidden</option>
                            </select>
                            <label for="status">status</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="code" id="properties-input-code" required>
                            <label for="code">properties code</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="properties-input-currency" name="currency" required>
                                <option value="IDR" selected>idr</option>
                                <option value="EUR">eur</option>
                                <option value="USD">usd</option>
                            </select>
                            <label for="currency">currency</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-number w25-9">
                            <input type="text" name="price" id="properties-input-price" class="input-number-format" style="color: transparent;" required>
                            <label for="price">price</label>
                            <p class="number-format"></p>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox justify-between">
                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="lease_period" id="properties-input-lease_year" required>
                            <label for="lease_period">period</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="lease_year" id="properties-input-lease_year" required>
                            <label for="lease_year">end year</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="building_size" id="properties-input-building_size" required>
                            <label for="building_size">building size(sqm)</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="land_size" id="properties-input-land_size" required>
                            <label for="land_size">land size(are)</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Views</h3>
                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="view_north" id="properties-input-view_north" required>
                            <label for="view_north">north</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="view_east" id="properties-input-view_east" required>
                            <label for="view_east">east</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="view_west" id="properties-input-view_west" required>
                            <label for="view_west">west</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="view_south" id="properties-input-view_south" required>
                            <label for="view_south">south</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="blog-input-lang" name="type" required>
                                <option value="for sell" selected>For Sell</option>
                                <option value="for rent">For Rent</option>
                            </select>
                            <label for="type">Type</label>
                        </div>
                        
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Property Description</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="description" id="properties-description" rows="10" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-facilities" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Specification</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="bedroom" id="properties-input-bedroom" required>
                            <label for="bedroom">bed</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="bathroom" id="properties-input-bathroom" required>
                            <label for="bathroom">bath</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w33-8">
                            <select id="properties-input-sell_in_furnish" name="sell_in_furnish" required>
                                <option value="0" selected>no</option>
                                <option value="1">yes</option>
                            </select>
                            <label for="sell_in_furnish">furnished</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between" style="max-height: 302px; overflow-y: scroll;">
                        <table id="properties-facilities-table">
                            <thead>
                                <tr>
                                    <td width="50%">Facility</td>
                                    <td width="50%">Description</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Garage</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-garage" id="properties-input-facility-garage" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Air Conditioning</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-ac" id="properties-input-facility-ac" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Water Resource</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-water" id="properties-input-facility-water" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Electricity</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-electricity" id="properties-input-facility-electricity" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Security</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-security" id="properties-input-facility-security" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kitchen</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-kitchen" id="properties-input-facility-kitchen" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dining Area</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-dining" id="properties-input-facility-dining" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pool</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-pool" id="properties-input-facility-pool" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jaccuzi</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-jaccuzi" id="properties-input-facility-jaccuzi" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gazebo</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-gazebo" id="properties-input-facility-gazebo" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-storage" id="properties-input-facility-storage" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Maid Room</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-maid" id="properties-input-facility-maid" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>WiFi</td>
                                    <td>
                                        <div class="m-input-wrapper">
                                            <input type="text" name="facility-wifi" id="properties-input-facility-wifi" required>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </m-caroussel-slide>

                <m-caroussel-slide class="justify-between flexbox flexbox-wrap" id="caroussel-distance" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper w50-6">
                        <input type="text" name="distance_beach" id="properties-input-distance_beach" required>
                        <label for="distance_beach">Beach</label>
                    </div>

                    <div class="m-input-wrapper m-input-wrapper-select w50-6">
                        <select id="properties-input-unit" name="unit" required>
                            <option value="km" selected>KM</option>
                            <option value="m">Meters</option>
                            <option value="minutes">Minutes</option>
                            <option value="hours">Hours</option>
                        </select>
                        <label for="unit">unit</label>
                    </div>

                    <div class="m-input-wrapper w50-6">
                        <input type="text" name="distance_airport" id="properties-input-distance_airport" required>
                        <label for="distance_airport">Airport</label>
                    </div>

                    <div class="m-input-wrapper m-input-wrapper-select w50-6">
                        <select id="properties-input-unit" name="unit" required>
                            <option value="km" selected>KM</option>
                            <option value="m">Meters</option>
                            <option value="minutes">Minutes</option>
                            <option value="hours">Hours</option>
                        </select>
                        <label for="unit">unit</label>
                    </div>

                    <div class="m-input-wrapper w50-6">
                        <input type="text" name="distance_market" id="properties-input-distance_market" required>
                        <label for="distance_market">Market</label>
                    </div>

                    <div class="m-input-wrapper m-input-wrapper-select w50-6">
                        <select id="properties-input-unit" name="unit" required>
                            <option value="km" selected>KM</option>
                            <option value="m">Meters</option>
                            <option value="minutes">Minutes</option>
                            <option value="hours">Hours</option>
                        </select>
                        <label for="unit">unit</label>
                    </div>

                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-gallery" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper" id="picture-wrapper">
                        <div class="drop-field">
                            <p class="drop-hint">drop files here</p>
                        </div>
                        <input class="m-image-input" type="file" name="files[]" id="properties-input-image" multiple>
                    </div>

                    <!-- <div class="gallery-wrapper flexbox flexbox-wrap justify-between">
                        <div class="gallery-item">
                            <a href class="gallery-item-option"><i class="material-icons">more_horiz</i></a>
                        </div>
                        <div class="gallery-item">
                            <a href class="gallery-item-option"><i class="material-icons">more_horiz</i></a>
                        </div>
                        <div class="gallery-item">
                            <a href class="gallery-item-option"><i class="material-icons">more_horiz</i></a>
                        </div>
                        <div class="gallery-item">
                            <a href class="gallery-item-option"><i class="material-icons">more_horiz</i></a>
                        </div>
                    </div> -->

                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-owner" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Owner Information</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner_name" id="properties-input-owner_name" required>
                            <label for="owner_name">name</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner_phone" id="properties-input-owner_phone" required>
                            <label for="owner_phone">phone</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner-email" id="properties-input-owner_email" required>
                            <label for="owner_email">email</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Agency Information</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="agent_commission" id="properties-input-agent_commission" required>
                            <label for="agent_commission">Commission</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="agent_contact" id="properties-input-agent_contact" required>
                            <label for="agent_contact">contact for viewing</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="agent_inspector" id="properties-input-agent_inspector" required>
                            <label for="agent_inspector">inspected by</label>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap" id="documents-received">
                        <h3 class="input-group-title">Documents Received</h3>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc_agent_agreement">
                                <input type="checkbox" name="doc_agent_agreement" id="properties-input-doc_agent_agreement">
                                Agent Agreement
                            </label>
                            <label for="properties-input-doc_pondok">
                                <input type="checkbox" name="doc_pondok" id="properties-input-doc_pondok">
                                Pondok Wisata License
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc_tax">
                                <input type="checkbox" name="doc_tax" id="properties-input-doc_tax">
                                Tax Construction
                            </label>
                            <label for="properties-input-doc_photo">
                                <input type="checkbox" name="doc_photo" id="properties-input-doc_photo">
                                Photographs
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc_imb">
                                <input type="checkbox" name="doc_imb" id="properties-input-doc_imb">
                                IMB
                            </label>
                            <label for="properties-input-doc_land">
                                <input type="checkbox" name="doc_land" id="properties-input-doc_land">
                                Land Certificate
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc_notary">
                                <input type="checkbox" name="doc_notary" id="properties-input-doc_notary">
                                Notary Details
                            </label>
                            <label for="properties-input-doc_owner_idcard">
                                <input type="checkbox" name="doc_owner_idcard" id="properties-input-doc_owner_idcard">
                                Owner ID Card
                            </label>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Reason for Selling</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="sell_reason" id="properties-input-sell_reason" rows="3" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Other Listing Agents</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="other_agent" id="properties-input-other_agent" rows="3" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Notes</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="sell_note" id="properties-input-sell_note" rows="5" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </m-caroussel-slide>
            </m-caroussel-slider>
        </m-caroussel-body>
    </m-caroussel>
    <input type="hidden" name="author" id="properties-input-admin" value="admin">
    <input type="hidden" name="property_type" id="property-input-type" value="properties">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain class="modal-close" id="close-properties-form">cancel</m-button>
        <m-button save-form plain>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@endsection

@section('scripts')

<script>
    Matter.admin.properties();
</script>

@endsection
