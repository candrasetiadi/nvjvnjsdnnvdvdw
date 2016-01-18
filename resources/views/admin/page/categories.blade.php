@extends('admin.master')
@section('page', 'categories')

@section('content')

<div class="categories-header">
    <ul class="flexbox">
        <li>Group</li>
        <li>Category</li>
        <li>Subcategory</li>
    </ul>
</div>

<div class="categories-wrapper flexbox">

    <div class="categories-group categories-group-main">
        <ul>
            <li>
                <div class="m-input-wrapper m-input-wrapper-select" style="margin-top: 32px; margin-bottom: 0;">
                    <select id="group-select" name="group" required>
                        <option value="-" disabled selected>group</option>
                        @foreach($navigation as $group)
                        <option value="{{ $group->id }}">{{ $group->data->title }}</option>
                        @endforeach
                    </select>
                    <label for="group">group</label>
                </div>
            </li>
            <li class="md-li align-right">
                <a href class="add-group modal-open" id="edit-group"><i class="material-icons">mode_edit</i></a>
                <a href class="add-group modal-open" data-target="#register-group"><i class="material-icons">add</i></a>
            </li>
        </ul>
    </div>

    <div class="categories-group">
        <ul id="category-select-wrapper">

        </ul>
    </div>

    <div class="categories-group">
        <ul id="subcategory-select-wrapper">

        </ul>
    </div>
</div>

@stop



@section('modal')

<div class="modal-wrapper" id="register-group">

    <div class="register-cat-wrapper modal-window">
        <h3>Add Group</h3>

        {!! Form::open(array('id' => 'group-create-form')) !!}
        <div class="m-input-wrapper k-media-wrapper">
            <div class="m-image-preview" id="image_input_group">
                <p class="drop-hint">drop group thumbnail here</p>
            </div>
            <input class="m-image-input" type="file" name="image" required>
        </div>

        <div class="m-input-wrapper m-input-wrapper-select w50-8">
            <select id="group-input-locale" name="lang" required>
                <option value="en" selected>english</option>
                <option value="id">indonesian</option>
            </select>
            <label for="lang">language</label>
        </div>

        <div class="register-nav-lang-bundle">
            <div class="m-input-wrapper">
                <input type="text" name="title" class="bind-input-from" id="group-input-title" data-target="#group-input-url" required>
                <label for="title">group title</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" name="url" id="group-input-url" required>
                <label for="url">group url</label>
            </div>
        </div>

        <input type="hidden" class="edit-flags" id="group-edit-flag" name="edit" value="0">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain direct-delete" id="delete-group" data-id="">delete</a>
            <a href class="md-button md-button-plain modal-close">cancel</a>
            <a href class="md-button md-button-plain" id="save-group">save</a>
        </div>
    </div>
</div>

<div class="modal-wrapper" id="register-category">

    <div class="register-cat-wrapper modal-window">
        <h3>Add Category</h3>

        {!! Form::open(array('id' => 'category-create-form')) !!}
        <div class="m-input-wrapper k-media-wrapper">
            <div class="m-image-preview" id="image_input_category">
                <p class="drop-hint">drop category thumbnail here</p>
            </div>
            <input class="m-image-input" type="file" name="image" required>
        </div>

        <div class="m-input-wrapper m-input-wrapper-select w50-8">
            <select id="category-input-locale" name="lang" required>
                <option value="en" selected>english</option>
                <option value="id">indonesian</option>
            </select>
            <label for="lang">language</label>
        </div>

        <div class="register-nav-lang-bundle">
            <div class="m-input-wrapper">
                <input type="text" name="title" class="bind-input-from" id="category-input-title" data-target="#category-input-url" required>
                <label for="title">category title</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" name="url" id="category-input-url" required>
                <label for="url">category url</label>
            </div>
        </div>

        <input type="hidden" class="edit-flags" id="category-edit-flag" name="edit" value="0">
        <input type="hidden" id="group-id" name="group_id" value="">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain direct-delete" id="delete-category" data-id="">delete</a>
            <a href class="md-button md-button-plain modal-close">cancel</a>
            <a href class="md-button md-button-plain" id="save-category">save</a>
        </div>
    </div>

</div>

<div class="modal-wrapper" id="register-subcategory">

    <div class="register-cat-wrapper modal-window" id="register-subcategory">
        <h3>Add Subategory</h3>

        {!! Form::open(array('id' => 'subcategory-create-form')) !!}
        <div class="m-input-wrapper k-media-wrapper">
            <div class="m-image-preview" id="image_input_subcategory">
                <p class="drop-hint">drop subcategory thumbnail here</p>
            </div>
            <input class="m-image-input" type="file" name="image" required>
        </div>

        <div class="m-input-wrapper m-input-wrapper-select w50-8">
            <select id="subcategory-input-language" name="lang" required>
                <option value="en" selected>english</option>
                <option value="id">indonesian</option>
            </select>
            <label for="lang">language</label>
        </div>

        <div class="register-nav-lang-bundle">
            <div class="m-input-wrapper">
                <input type="text" name="title" class="bind-input-from" id="subcategory-input-title" data-target="#subcategory-input-url" required>
                <label for="title_en">subcategory title</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" name="url" id="subcategory-input-url" required>
                <label for="url">subcategory url</label>
            </div>
        </div>

        <input type="hidden" class="edit-flags" id="subcategory-edit-flag" name="edit" value="0">
        <input type="hidden" id="category-id" name="category_id" value="">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain direct-delete" id="delete-subcategory" data-id="">delete</a>
            <a href class="md-button md-button-plain modal-close">cancel</a>
            <a href class="md-button md-button-plain" id="save-subcategory">save</a>
        </div>
    </div>

</div>

@stop

@section('scripts')
<script>
    Matter.admin.categories();
</script>
@stop
