@extends('admin.master')
@section('page', 'properties')

@section('fab')

<m-fab salmon class="modal-open" data-target="#property-add"><i class="material-icons">add</i></m-fab>

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
<m-template list class="property-wrapper">

    @if(isset($properties) AND count($properties) > 0)
    <table>
        <thead>
            <td width="5%">
                <m-list-item-check all></m-list-item-check>
            </td>
            <td>Image</td>
            <td>Title</td>
            <td>Created</td>
            <td>Code</td>
            <td>Type</td>
            <td>Publish</td>
            <td>Agent</td>
            <td>Price</td>
            <td>View</td>
            <td></td>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <?php $images = $property->propertyFiles()->where('type', 'image'); ?>
            <tr class="property-item" id="property-item-{{ $property->id }}">
                <td width="5%">
                    <m-list-item-check single data-id="{{ $property->id }}"></m-list-item-check>
                </td>
                <td class="image">
                    {!! ($images->count() > 0) ? '<a href="'. asset('uploads/property/' . $images->first()->file) . '"></a>' : '-'; !!}
                </td>
                <td class="title">{{ $property->lang()->title }}</td>
                <td class="created_at">{{ $property->created_at }}</td>
                <td class="code">{{ $property->code }}</td>
                <td class="type">{{ ucwords($property->type) }}</td>
                <td class="publish">{{ ucfirst($property->publish) }}</td>
                <td class="view">{{ $property->user->firstname }}</td>
                <td class="price align-center">{{ number_format($property->price, 2) }}</td>
                <td class="view align-center">{{ humanize($property->view) }}</td>
                <td button>
                    <m-table-list-more>
                        <i class="material-icons">more_horiz</i>
                        <m-list-menu data-id="{{ $property->id }}">
                            <m-list-menu-item edit data-source="property/get" data-function="populatePropertyEdit">EDIT</m-list-menu-item>
                            <m-list-menu-item delete data-url="property/destroy">DELETE</m-list-menu-item>
                        </m-list-menu>
                    </m-table-list-more>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-content">No properties created yet. Create one now</p>

    @endif

</m-template>

@include('admin.fragments.pagination', ['paginator' => $properties])

@endsection

@section('modal')

<m-modal-wrapper id="property-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'property-form', 'data-function' => 'modalClose', 'data-url' => 'property/store')) !!}
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
                            <input url-format data-target="#property-input-slug" type="text" name="title" id="property-input-title" required>
                            <label for="title">title</label>
                        </div>

                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="slug" id="property-input-slug" required>
                            <label for="slug">url</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">

                        <h3 class="input-group-title">General Information</h3>

                        <m-input fwidth select w25-9>
                            <input type="text" select id="property-input-status" name="status" value="available" required>
                            <label for="property-input-status">status</label>
                            <m-select>
                                <m-option value="1">available</m-option>
                                <m-option value="0">unavailable</m-option>
                                <m-option value="-1">hidden</m-option>
                            </m-select>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="code" id="property-input-code" required>
                            <label for="code">property code</label>
                        </m-input>

                        <m-input fwidth select w25-9>
                            <input type="text" select id="property-input-currency" name="currency" value="IDR" required>
                            <label for="property-input-currency">currency</label>
                            <m-select>
                                <m-option value="IDR">idr</m-option>
                                <m-option value="EUR">eur</m-option>
                                <m-option value="USD">usd</m-option>
                            </m-select>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="price" id="property-input-price" required>
                            <label for="property-input-price">price</label>
                        </m-input>
                    </div>

                    <div class="m-input-group fwidth flexbox justify-between">
                        <m-input w25-9>
                            <input type="text" name="lease_period" id="property-input-lease_period" required>
                            <label for="lease_period">period</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="lease_year" id="property-input-lease_year" required>
                            <label for="lease_year">end year</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="building_size" id="property-input-building_size" required>
                            <label for="building_size">building size(sqm)</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="land_size" id="property-input-land_size" required>
                            <label for="land_size">land size(are)</label>
                        </m-input>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Views</h3>
                        <m-input w25-9>
                            <input type="text" name="view_north" id="property-input-view_north" required>
                            <label for="view_north">north</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="view_east" id="property-input-view_east" required>
                            <label for="view_east">east</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="view_west" id="property-input-view_west" required>
                            <label for="view_west">west</label>
                        </m-input>

                        <m-input w25-9>
                            <input type="text" name="view_south" id="property-input-view_south" required>
                            <label for="view_south">south</label>
                        </m-input>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">

                        <m-input fwidth select w50-6>
                            <input type="text" select id="property-input-type" name="type" value="for sell" required>
                            <label for="property-input-type">type</label>
                            <m-select>
                                <m-option value="for sell">for sell</m-option>
                                <m-option value="for rent">for rent</m-option>
                            </m-select>
                        </m-input>

                        <m-input fwidth select w50-6>
                            <input type="text" select id="property-input-category_id" name="category_id" required>
                            <label for="property-input-category_id">category</label>
                            <m-select>

                                @foreach($categories as $category)
                                <m-option value="{{ $category->id }}">{{ ucwords($category->name()) }}</m-option>
                                @endforeach

                            </m-select>
                        </m-input>

                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">

                        <m-input fwidth select w50-6>
                            <input type="text" select id="property-input-is_price_request" name="is_price_request" value="0" required>
                            <label for="property-input-is_price_request">is price request</label>
                            <m-select>
                                <m-option value="0">no</m-option>
                                <m-option value="1">yes</m-option>
                            </m-select>
                        </m-input>

                        <m-input fwidth select w50-6>
                            <input type="text" select id="property-input-is_exclusive" name="is_exclusive" value="0" required>
                            <label for="property-input-is_exclusive">is Exclusive</label>
                            <m-select>
                                <m-option value="0">no</m-option>
                                <m-option value="1">yes</m-option>
                            </m-select>
                        </m-input>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Property Description</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="description" id="property-input-description" rows="10" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-facilities" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Specification</h3>

                        <div class="m-input-group fwidth flexbox flexbox-wrap justify-between" id="facility-wrapper">
                            <m-input w50-6>
                                <input type="text" name="facilities[bedroom]" id="property-input-facilities[bedroom]" required>
                                <label for="facilities[bedroom]">bed</label>
                            </m-input>

                            <m-input w50-6>
                                <input type="text" name="facilities[bathroom]" id="property-input-facilities[bathroom]" required>
                                <label for="facilities[bathroom]">bath</label>
                            </m-input>
                        </div>

                        <m-input select w50-6>
                            <input type="text" select id="property-input-sell_in_furnish" name="sell_in_furnish" value="0" required>
                            <label for="property-input-sell_in_furnish">furnished</label>
                            <m-select>
                                <m-option value="0">no</m-option>
                                <m-option value="1">yes</m-option>
                            </m-select>
                        </m-input>
                        <div class="push-bottom"></div>
                    </div>

                </m-caroussel-slide>

                <m-caroussel-slide class="justify-between flexbox flexbox-wrap" id="caroussel-distance" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper w50-6">
                        <input type="text" name="distance_value[beach]" id="property-input-distance_value[beach]" required>
                        <label for="distance_value[beach]">Beach</label>
                    </div>

                    <m-input select w50-6>
                        <input type="text" select id="property-input-distance_unit_beach" name="distance_unit[beach]" required>
                        <label for="property-input-distance_unit_beach">unit</label>
                        <m-select>
                            <m-option value="km" selected>KM</m-option>
                            <m-option value="m">Meters</m-option>
                            <m-option value="minutes">Minutes</m-option>
                            <m-option value="hours">Hours</m-option>
                        </m-select>
                    </m-input>

                    <m-input w50-6>
                        <input type="text" name="distance_value[airport]" id="property-input-distance_value[airport]" required>
                        <label for="distance_value[airport]">Airport</label>
                    </m-input>

                    <m-input select w50-6>
                        <input type="text" select id="property-input-distance_unit_airport" name="distance_unit[airport]" required>
                        <label for="property-input-distance_unit_airport">unit</label>
                        <m-select>
                            <m-option value="km" selected>KM</m-option>
                            <m-option value="m">Meters</m-option>
                            <m-option value="minutes">Minutes</m-option>
                            <m-option value="hours">Hours</m-option>
                        </m-select>
                    </m-input>

                    <m-input w50-6>
                        <input type="text" name="distance_value[market]" id="property-input-distance_value[market]" required>
                        <label for="distance_value[market]">Market</label>
                    </m-input>

                    <m-input select w50-6>
                        <input type="text" select id="property-input-distance_unit_market" name="distance_unit[market]" required>
                        <label for="property-input-distance_unit_market">unit</label>
                        <m-select>
                            <m-option value="km" selected>KM</m-option>
                            <m-option value="m">Meters</m-option>
                            <m-option value="minutes">Minutes</m-option>
                            <m-option value="hours">Hours</m-option>
                        </m-select>
                    </m-input>
                    <div class="push-bottom"></div>

                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-gallery" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <m-input picture>
                        <div class="drop-field">
                            <p class="drop-hint">drop files here</p>
                        </div>
                        <input class="m-image-input" type="file" name="files[]" id="property-input-image" multiple>
                    </m-input>

                    <div id="gallery-wrapper" flexwrap style="width: 100%">
                        <?php for($i = 0; $i < 11; $i++): ?>
                        <m-gallery-item style="background-image: url('http://loremflickr.com/320/240?t={{ microtime() }}')" data-id="23">
                            <m-gallery-item-menu>
                                <m-button class="make-thumbnail" data-function="makeThumbnail">
                                    <i class="material-icons">star_border</i>
                                </m-button>
                                <m-button delete data-url="propertyimage/destroy">
                                    <i class="material-icons">close</i>
                                </m-button>
                            </m-gallery-item-menu>
                        </m-gallery-item>
                        @endfor
                    </div>

                </m-caroussel-slide>

                <m-caroussel-slide class="flexbox flexbox-wrap" id="caroussel-owner" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Owner Information</h3>
                        <m-input w33-8>
                            <input type="text" name="owner_name" id="property-input-owner_name" required>
                            <label for="owner_name">name</label>
                        </m-input>

                        <m-input w33-8>
                            <input type="text" name="owner_phone" id="property-input-owner_phone" required>
                            <label for="owner_phone">phone</label>
                        </m-input>

                        <m-input w33-8>
                            <input type="text" name="owner_email" id="property-input-owner_email" required>
                            <label for="owner_email">email</label>
                        </m-input>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Agency Information</h3>
                        <m-input w33-8>
                            <input type="text" name="agent_commission" id="property-input-agent_commission" required>
                            <label for="agent_commission">Commission</label>
                        </m-input>

                        <m-input w33-8>
                            <input type="text" name="agent_contact" id="property-input-agent_contact" required>
                            <label for="agent_contact">contact for viewing</label>
                        </m-input>

                        <m-input w33-8>
                            <input type="text" name="agent_inspector" id="property-input-agent_inspector" required>
                            <label for="agent_inspector">inspected by</label>
                        </m-input>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap" id="documents-received">
                        <h3 class="input-group-title">Documents Received</h3>

                        <m-input checkbox neutral w25-9>
                            <label for="property-input-documents[agent agreement]">
                                <input type="checkbox" name="documents[agent agreement]" id="property-input-documents[agent agreement]">
                                Agent Agreement
                            </label>
                            <label for="property-input-documents[pondok wisata license]">
                                <input type="checkbox" name="documents[pondok wisata license]" id="property-input-documents[pondok wisata license]">
                                Pondok Wisata License
                            </label>
                        </m-input>
                        <m-input checkbox neutral w25-9>
                            <label for="property-input-documents[tax construction]">
                                <input type="checkbox" name="documents[tax construction]" id="property-input-documents[tax construction]">
                                Tax Construction
                            </label>
                            <label for="property-input-documents[photographs]">
                                <input type="checkbox" name="documents[photographs]" id="property-input-documents[photographs]">
                                Photographs
                            </label>
                        </m-input>
                        <m-input checkbox neutral w25-9>
                            <label for="property-input-documents[imb]">
                                <input type="checkbox" name="documents[imb]" id="property-input-documents[imb]">
                                IMB
                            </label>
                            <label for="property-input-documents[land certificate">
                                <input type="checkbox" name="documents[land certificate]" id="property-input-documents[land certificate]">
                                Land Certificate
                            </label>
                        </m-input>
                        <m-input checkbox neutral w25-9>
                            <label for="property-input-documents[notary details]">
                                <input type="checkbox" name="documents[notary details]" id="property-input-documents[notary details]">
                                Notary Details
                            </label>
                            <label for="property-input-documents[owner idcard]">
                                <input type="checkbox" name="documents[owner idcard]" id="property-input-documents[owner idcard]">
                                Owner ID Card
                            </label>
                        </m-input>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Reason for Selling</h3>
                        <m-input fwidth>
                            <textarea name="sell_reason" id="property-input-sell_reason" rows="3" style="padding-top: 0"></textarea>
                        </m-input>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Other Listing Agents</h3>
                        <m-input fwidth>
                            <textarea name="other_agent" id="property-input-other_agent" rows="3" style="padding-top: 0"></textarea>
                        </m-input>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Notes</h3>
                        <m-input fwidth>
                            <textarea name="sell_note" id="property-input-sell_note" rows="5" style="padding-top: 0"></textarea>
                        </m-input>
                    </div>
                </m-caroussel-slide>
            </m-caroussel-slider>
        </m-caroussel-body>
    </m-caroussel>
    <input type="hidden" name="author" id="property-input-admin" value="admin">
    <input type="hidden" name="property_type" id="property-input-type" value="property">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <m-buttons flexbox justify-end>
        <m-button plain class="modal-close" id="close-properties-form">cancel</m-button>
        <m-button save-form plain>save</m-button>
    </m-buttons>
    {!! Form::close() !!}
</m-modal-wrapper>
@endsection

@section('scripts')

<script>
    Matter.admin.properties();
</script>

@endsection
