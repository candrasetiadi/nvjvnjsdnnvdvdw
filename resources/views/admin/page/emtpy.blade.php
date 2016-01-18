@extends('admin.master')
@section('page', 'empty')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#empty-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="empty-wrapper flexbox flexbox-wrap">

    <table class="m-table-list empty-table">
        <thead>
            <td width="3%"><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="40%">Title</td>
            <td width="14%">Price</td>
            <td width="15%">created</td>
            <td width="15%">on until</td>
            <td width="10%">author</td>
            <td width="3%"></td>
        </thead>
        <tbody>
            @foreach($dummies as $dummy)
            <tr class="product-item" data-id="1">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="title">{{ $dummy['name'] }}</td>
                <td class="elapsed">{{ $dummy['price'] }}</td>
                <td class="created">{{ $dummy['price'] }}</td>
                <td class="updated">{{ $dummy['word'] }}</td>
                <td class="author">{{ $dummy['lastname'] }}</td>
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

<div class="modal-wrapper" id="empty-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'empty-form')) !!}
    <h3>Add empty</h3>
    <div class="input-group-caroussel">

        <div class="input-group-caroussel-header flexbox justify-end">
            <ul class="caroussel-switch flexbox">
                <li><a href class="empty-caroussel-switch active">general info</a></li>
                <li><a href class="empty-caroussel-switch">description</a></li>
            </ul>
        </div>

        <div class="input-group-caroussel-body">
            <div class="input-group-caroussel-slider flexbox align-start">
                <div class="input-group-caroussel-slide flexbox flexbox-wrap" id="caroussel-general">

                    <div class="m-input-group fwidth flexbox justify-between">
                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="title" id="empty-input-title" class="bind-input-from" data-target="#empty-input-url" required>
                            <label for="title">title</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="empty-input-currency" name="currency" required>
                                <option value="usd" selected>usd</option>
                                <option value="idr">idr</option>
                                <option value="eur">eur</option>
                            </select>
                            <label for="currency">currency</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-number w25-9">
                            <input type="text" name="price" id="empty-input-price" class="input-number-format" style="color: transparent;" required>
                            <label for="price">price</label>
                            <p class="number-format"></p>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">

                        <h3 class="input-group-title">Duration</h3>
                        <div class="m-input-group w33 flexbox justify-start">
                            <div class="m-input-wrapper w50-6" style="margin-right: 12px;">
                                <input type="text" name="dives" id="empty-input-dives" required>
                                <label for="dives">dives</label>
                            </div>

                            <div class="m-input-wrapper w50-6">
                                <input type="text" name="duration" id="empty-input-duration" required>
                                <label for="duration">days</label>
                            </div>
                        </div>

                        <h3 class="input-group-title">Gallery</h3>
                        <div class="m-input-wrapper" id="picture-wrapper">
                            <div class="drop-field">
                                <p class="drop-hint">drop files here</p>
                            </div>
                            <input class="m-image-input" type="file" name="files[]" id="villa-input-image" multiple>
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
                </div>

                <div class="input-group-caroussel-slide flexbox flexbox-wrap justify-between" id="caroussel-gallery">

                    <div class="m-input-group textarea w50-6 flexbox flexbox-wrap">
                        <h3 class="input-group-title">Itinerary</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="itinerary" id="empty-itinerary" rows="5" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea w50-6 flexbox flexbox-wrap">
                        <h3 class="input-group-title">pre-requisites</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="prereq" id="empty-prereq" rows="5" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">included</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="included" id="empty-included" rows="5" style="padding-top: 0"></textarea>
                        </div>
                    </div>

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <h3 class="input-group-title">Description</h3>
                        <div class="input-wrapper fwidth">
                            <textarea name="description" id="empty-description" rows="10" style="padding-top: 0"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="author_id" id="empty-input-admin" value="1">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-empty-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-empty">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
</script>

@endsection
