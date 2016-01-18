@extends('admin.master')
@section('page', 'pages')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover target-active" data-target="#page-add"><i class="material-icons">add</i></a>

<div class="small-fab-wrapper">
    <a class="fab-button fab-button-small shadow-hover modal-open" data-target="#page-add-trip">
        <i class="material-icons">location_on</i>
        <span class="drop-fab-hint">trip page</span>
    </a>

    <a class="fab-button fab-button-small shadow-hover modal-open" data-target="#page-add-trip">
        <i class="material-icons">event</i>
        <span class="drop-fab-hint">event page</span>
    </a>

    <a class="fab-button fab-button-small shadow-hover modal-open" data-target="#page-add-trip">
        <i class="material-icons">insert_drive_file</i>
        <span class="drop-fab-hint">blank page</span>
    </a>
</div>

@stop

@section('content')
<div class="pages-wrapper flexbox flexbox-wrap">


</div>

@stop

@section('modal')

<div class="modal-wrapper" id="page-add-trip">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'page-trip-form')) !!}
    <div id="expandable-textarea">
        <div class="input-wrapper" id="picture-wrapper" style="height: 210px;">
            <div class="m-image-preview" id="blog-image-preview">
                <p class="drop-hint picture-preview-hint"><i class="material-icons">file_upload</i>Upload Image</p>
            </div>
            <input class="m-image-input" type="file" name="blog-banner" id="blog-input-image" required>
        </div>

        <div class="input-group head">

            <div class="m-input-group m-input-group-half">

                <div class="m-input-wrapper">
                    <input type="text" name="title" id="blog-input-title" class="bind-input-from" data-target="#blog-input-url" required>
                    <label for="title">title</label>
                </div>

                <div class="m-input-wrapper">
                    <input type="text" name="url" id="blog-input-url" required>
                    <label for="url">url</label>
                </div>

            </div>

            <div class="m-input-group m-input-group-third">

                <div class="m-input-wrapper">
                    <input type="text" id="blog-input-lang" name="lang" required>
                    <label for="lang">lang</label>
                </div>

                <div class="m-input-wrapper">
                    <input type="text" id="blog-input-status" name="status" required>
                    <label for="status">status</label>
                </div>

                <div class="m-input-wrapper">
                    <input type="text" id="blog-input-category" name="category" required>
                    <label for="category">category</label>
                </div>

            </div>

            <div class="m-input-wrapper">
                <input type="text" id="blog-input-meta_key" name="meta_key" required>
                <label for="meta_key">tags</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" id="blog-input-meta_desc" name="meta_desc" required>
                <label for="meta_desc">short description</label>
            </div>
        </div>
    </div>

    <div class="input-group textarea">
        <div class="input-wrapper">
            <textarea name="content" id="blog-content" rows="5"></textarea>
        </div>
    </div>
    <input type="hidden" name="author" id="blog-input-admin" value="admin">
    <input type="hidden" name="edit" data-edit="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-blog-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-blog">save</a>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('scripts')
<script type="text/javascript">
   Matter.admin.pages();
</script>
@stop
