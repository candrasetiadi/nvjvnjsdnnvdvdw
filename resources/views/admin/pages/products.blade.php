@extends('admin.master')
@section('page', 'products')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#product-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="products-wrapper flexbox flexbox-wrap">

    <div class="action-bar flexbox fwidth">
        <div class="m-input-wrapper m-input-wrapper w33" id="action-search-wrapper">
            <input type="text" id="action-search-input" data-table="product" data-action="populateProductSearch" required>
            <i class="material-icons">search</i>
        </div>
        <div class="action-buttons-wrapper flexbox w33 justify-end" style="opacity: 0;">
            <a href class="action-button">
                <i class="material-icons">apps</i>
            </a>
            <a href class="action-button">
                <i class="material-icons">more_horiz</i>
            </a>
            <a href class="action-button">
                <i class="material-icons">more_vertical</i>
            </a>
        </div>
    </div>

    <table class="m-table-list products-table fwidth">
        <thead>
            <td width="3%"><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="50%">Title</td>
            <td width="19%" class="align-center">sku</td>
            <td width="15%" class="align-center">created</td>
            <td width="10%" class="align-center">status</td>
            <td width="3%"></td>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr class="product-item" data-id="{{ $product->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="{{ $product->id }}"><i class="m-checkbox"></i></a></td>
                <td class="title">{{ $product->title }}</td>
                <td class="sku align-center">{{ $product->sku }}</td>
                <td class="created align-center">{{ $product->created_at }}</td>
                <td class="author align-center">{{ $product->status == 1 ? 'ENABLED' : 'DISABLED' }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option"><ul>
                        <li><a href="{{ $product->id }}" class="item-edit">edit</a></li>
                        <li><a href="{{ $product->id }}" class="item-duplicate">duplicate</a></li>
                        <li><a href="/system/ajax/product/delete/{{ $product->id }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="md-card fwidth align-center load-more" data-start="1" data-limit="48" data-action="getMoreProducts">LOAD MORE</a>
</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="product-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'product-form')) !!}
    <h3>Add product</h3>
    <div class="input-group-caroussel">

        <div class="input-group-caroussel-header flexbox justify-end">
            <ul class="caroussel-switch flexbox">
                <?php $numberOfSlides = 4 ?>
                <li><a href class="product-caroussel-switch active">product info</a></li>
                <li><a href class="product-caroussel-switch">locale</a></li>
                <li><a href class="product-caroussel-switch">properties</a></li>
                <li><a href class="product-caroussel-switch">media</a></li>
            </ul>
        </div>

        <div class="input-group-caroussel-body">

            <div class="input-group-caroussel-slider flexbox align-start" style="width: <?= $numberOfSlides ?>00%;">

                <div class="input-group-caroussel-slide flexbox flexbox-wrap" id="caroussel-general" style="width: calc(100% / <?= $numberOfSlides ?>)">
                    <div class="m-input-group fwidth flexbox justify-between">
                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="title" id="product-input-title" class="bind-input-from" data-target="#product-input-url" required>
                            <label for="title">title</label>
                        </div>
                        <div class="m-input-wrapper w50-6">
                            <input type="text" name="url" id="product-input-url" required>
                            <label for="url">product url</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox justify-between">

                        <div class="m-input-wrapper m-input-wrapper w25-9">
                            <input type="text" name="sku" id="product-input-sku" required>
                            <label for="sku">sku</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="product-input-bestseller" name="bestseller" required>
                                <option value="0" selected>no</option>
                                <option value="1">yes</option>
                            </select>
                            <label for="bestseller">bestseller</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="product-input-overstock" name="overstock" required>
                                <option value="0" selected>no</option>
                                <option value="1">yes</option>
                            </select>
                            <label for="overstock">overstock</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w25-9">
                            <select id="product-input-status" name="status" required>
                                <option value="1" selected>available</option>
                                <option value="0">unavailable</option>
                            </select>
                            <label for="status">status</label>
                        </div>
                    </div>

                    <div class="m-input-group fwidth flexbox justify-start">
                        <div class="m-input-wrapper m-input-wrapper-select w33-8" style="margin-right: 12px;">
                            <select class="group-select" id="product-input-group_id" name="group" required>
                                <option value="-" selected disabled>Select a group</option>
                                @foreach($navigation as $group)
                                <option value="{{ $group->id }}">{{ $group->data->title }}</option>
                                @endforeach
                            </select>
                            <label for="group">group</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w33-8" id="category-select-wrapper" style="margin-right: 12px;">

                        </div>

                        <div class="m-input-wrapper m-input-wrapper-select w33-8" id="subcategory-select-wrapper">

                        </div>
                    </div>
                </div>

                <div class="input-group-caroussel-slide flexbox flexbox-wrap" id="caroussel-locale" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                        <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                            <h3 class="input-group-title">meta description</h3>
                            <div class="input-wrapper fwidth">
                                <textarea name="meta_desc" id="product-input-meta_desc" rows="3" style="padding-top: 0"></textarea>
                            </div>
                        </div>

                        <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                            <h3 class="input-group-title">keywords</h3>
                            <div class="input-wrapper fwidth">
                                <textarea name="keywords" id="product-input-keywords" rows="1" style="padding-top: 0"></textarea>
                            </div>
                        </div>

                        <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
                            <h3 class="input-group-title">description</h3>
                            <div class="input-wrapper fwidth">
                                <textarea name="description" id="product-input-description" rows="6" style="padding-top: 0"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group-caroussel-slide flexbox flexbox-wrap justify-between" id="caroussel-properties" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group fwidth flexbox flexbox-wrap justify-between" id="size-container">
                        <div class="m-input-wrapper m-input-wrapper w75-6">
                            <input type="text" name="sizes_desc[]" required>
                            <label for="sizes_desc">size description</label>
                        </div>

                        <div class="m-input-wrapper m-input-wrapper w25-6">
                            <input type="text" name="sizes_values[]" required>
                            <label for="sizes_values">size value(cm)</label>
                            <a href class="size-delete" style="position: absolute; top: 0; right: 0;"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div class="button-wrapper fwidth align-right">
                        <a href class="md-button md-button-black" id="size-add">add size</a>
                    </div>
                </div>

                <div class="input-group-caroussel-slide flexbox flexbox-wrap justify-between" id="caroussel-gallery" style="width: calc(100% / <?= $numberOfSlides ?>)">

                    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">

                        <h3 class="input-group-title">Gallery</h3>
                        <div class="m-input-wrapper" id="picture-wrapper">
                            <div class="drop-field">
                                <p class="drop-hint">drop files here</p>
                            </div>
                            <input class="m-image-input" type="file" name="media[]" id="media-input" multiple>
                        </div>

                        <div class="gallery-wrapper flexbox flexbox-wrap justify-start" id="media-wrapper">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-product-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-product">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.products();
</script>

@endsection
