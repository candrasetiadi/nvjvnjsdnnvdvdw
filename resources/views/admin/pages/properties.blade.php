@extends('admin.master')
@section('page', 'properties')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#properties-add"><i class="material-icons">add</i></a>

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
<<<<<<< HEAD
<div class="property-wrapper flexbox flexbox-wrap">

    <table class="m-table-list property-table">
=======
<div class="properties-wrapper flexbox flexbox-wrap">

    <table class="m-table-list properties-table">
>>>>>>> 0ca74c0723d50d77685cc59c2913a356d30eb84c
        <thead>
            <td><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td>Title</td>
            <td>Price</td>
            <td>Type</td>
            <td>Publish</td>
            <td>Action</td>
        </thead>
        <tbody>
<<<<<<< HEAD
            @foreach($properties as $property)
            <tr class="property-item" data-id="1">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="title">{{ $property->propertyLanguages()->where('language', Lang::getLocale())->first()->title }}</td>
=======
            <tr class="properties-item" data-id="1">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="title">Beautiful properties</td>
                <td class="url">VCAN001</td>
                <td class="created">IDR 9,350,000,000</td>
                <td class="status">2015-12-21</td>
                <td class="status">2016-12-20</td>
                <td class="author">ENABLED</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="1"><ul>
                        <li><a href class="item-edit">edit</a></li>
                        <li><a href class="item-duplicate">duplicate</a></li>
                        <li><a href class="item-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr class="properties-item" data-id="2">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="2"><i class="m-checkbox"></i></a></td>
                <td class="title">Beach Front properties in Seminyak</td>
                <td class="url">VSEM001</td>
                <td class="created">IDR 23,250,000,000</td>
                <td class="status">2015-12-21</td>
                <td class="status">2018-12-20</td>
                <td class="author">ENABLED</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="2"><ul>
                        <li><a href class="item-edit">edit</a></li>
                        <li><a href class="item-duplicate">duplicate</a></li>
                        <li><a href class="item-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr class="properties-item" data-id="1">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="title">5 Bedroom Luxury properties with Ricefield View</td>
                <td class="url">VKER001</td>
                <td class="created">IDR 12,000,000,000</td>
                <td class="status">2015-12-21</td>
                <td class="status">2017-12-20</td>
                <td class="author">ENABLED</td>
>>>>>>> 0ca74c0723d50d77685cc59c2913a356d30eb84c
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="1"><ul>
                        <li><a href class="item-edit">edit</a></li>
                        <li><a href class="item-duplicate">duplicate</a></li>
                        <li><a href class="item-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="properties-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'properties-form')) !!}
    <h3>Add property:properties</h3>
    <div class="matter-caroussel">

        <div class="matter-caroussel-header flexbox justify-end">
            <ul class="matter-caroussel-switch-wrapper flexbox">
                <?php $numberOfSlides = 5 ?>
                <li><a href class="matter-caroussel-switch active">detail</a></li>
                <li><a href class="matter-caroussel-switch">facilities</a></li>
                <li><a href class="matter-caroussel-switch">distance</a></li>
                <li><a href class="matter-caroussel-switch">gallery</a></li>
                <li><a href class="matter-caroussel-switch">owner</a></li>
            </ul>
        </div>

        <div class="matter-caroussel-body">
            <div class="matter-caroussel-slider flexbox align-start" style="width: <?= $numberOfSlides ?>00%;">

                <div class="matter-caroussel-slide flexbox flexbox-wrap" id="caroussel-general" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox justify-between">
                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="title" id="properties-input-title" class="bind-input-from" data-target="#properties-input-url" required>
                            <label for="title">title</label>
                        </div>

                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="url" id="properties-input-url" required>
                            <label for="url">url</label>
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
                                <option value="idr" selected>idr</option>
                                <option value="eur">eur</option>
                                <option value="usd">usd</option>
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
                            <input type="text" name="period" id="properties-input-period" required>
                            <label for="period">period</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="ending" id="properties-input-ending" required>
                            <label for="ending">end year</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="buildsize" id="properties-input-buildsize" required>
                            <label for="buildsize">building size(sqm)</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="landsize" id="properties-input-landsize" required>
                            <label for="landsize">land size(are)</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Views</h3>
                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="viewn" id="properties-input-viewn" required>
                            <label for="viewn">north</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="viewe" id="properties-input-viewe" required>
                            <label for="viewe">east</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="vieww" id="properties-input-vieww" required>
                            <label for="vieww">west</label>
                        </div>

                        <div class="m-input-wrapper w25-9">
                            <input type="text" name="views" id="properties-input-views" required>
                            <label for="views">south</label>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Property Description</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="description" id="properties-description" rows="10" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </div>

                <div class="matter-caroussel-slide flexbox flexbox-wrap" id="caroussel-facilities" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Specification</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="bed" id="properties-input-bed" required>
                            <label for="bed">bed</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="bath" id="properties-input-bath" required>
                            <label for="bath">bath</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w33-8">
                            <select id="properties-input-furnished" name="furnished" required>
                                <option value="0" selected>no</option>
                                <option value="1">yes</option>
                            </select>
                            <label for="furnished">furnished</label>
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
                </div>

                <div class="matter-caroussel-slide flexbox flexbox-wrap" id="caroussel-distance" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper">
                        <input type="text" name="chingchong" id="properties-input-title" class="bind-input-from" data-target="#properties-input-url" required>
                        <label for="chingchong">chingchong</label>
                    </div>
                </div>

                <div class="matter-caroussel-slide flexbox flexbox-wrap" id="caroussel-gallery" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-wrapper" id="picture-wrapper">
                        <div class="drop-field">
                            <p class="drop-hint">drop files here</p>
                        </div>
                        <input class="m-image-input" type="file" name="files[]" id="properties-input-image" multiple>
                    </div>

                    <div class="gallery-wrapper flexbox flexbox-wrap justify-between">
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
                    </div>
                </div>

                <div class="matter-caroussel-slide flexbox flexbox-wrap" id="caroussel-owner" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Owner Information</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner-name" id="properties-input-owner-name" required>
                            <label for="owner-name">name</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner-phone" id="properties-input-owner-phone" required>
                            <label for="owner-phone">phone</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="owner-email" id="properties-input-owner-email" required>
                            <label for="owner-email">email</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between">
                        <h3 class="input-group-title">Agency Information</h3>
                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="commission" id="properties-input-commission" required>
                            <label for="commission">Commission</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="agent-contact" id="properties-input-agent-contact" required>
                            <label for="agent-contact">contact for viewing</label>
                        </div>

                        <div class="m-input-wrapper w33-8">
                            <input type="text" name="inspector" id="properties-input-inspector" required>
                            <label for="inspector">inspected by</label>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap" id="documents-received">
                        <h3 class="input-group-title">Documents Received</h3>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc-agent-agreement">
                                <input type="checkbox" name="doc-agent-agreement" id="properties-input-doc-agent-agreement">
                                Agent Agreement
                            </label>
                            <label for="properties-input-doc-pondok">
                                <input type="checkbox" name="doc-pondok" id="properties-input-doc-pondok">
                                Pondok Wisata License
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc-tax">
                                <input type="checkbox" name="doc-tax" id="properties-input-doc-tax">
                                Tax Construction
                            </label>
                            <label for="properties-input-doc-photo">
                                <input type="checkbox" name="doc-photo" id="properties-input-doc-photo">
                                Photographs
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc-imb">
                                <input type="checkbox" name="doc-imb" id="properties-input-doc-imb">
                                IMB
                            </label>
                            <label for="properties-input-doc-land">
                                <input type="checkbox" name="doc-land" id="properties-input-doc-land">
                                Land Certificate
                            </label>
                        </div>
                        <div class="m-input-wrapper m-input-wrapper-checkbox neutral w25-9">
                            <label for="properties-input-doc-notary">
                                <input type="checkbox" name="doc-notary" id="properties-input-doc-notary">
                                Notary Details
                            </label>
                            <label for="properties-input-doc-ownerid">
                                <input type="checkbox" name="doc-ownerid" id="properties-input-doc-ownerid">
                                Owner ID
                            </label>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Reason for Selling</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="selling-reason" id="properties-input-selling-reason" rows="3" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Other Listing Agents</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="other-agents" id="properties-input-other-agents" rows="3" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Notes</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="seller-notes" id="properties-input-seller-notes" rows="5" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="author" id="properties-input-admin" value="admin">
    <input type="hidden" name="property_type" id="property-input-type" value="properties">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-properties-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-properties">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.properties();
</script>

@endsection
