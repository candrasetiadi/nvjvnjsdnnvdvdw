@extends('admin.master')
@section('page', 'blog')

@section('fab')

<button class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#blog-add"><i class="material-icons">add</i></button>

@stop

@section('content')
<div class="blogs-wrapper flexbox flexbox-wrap">

    <table class="list blogs-table">
        <thead>
            <td width="3%"><button href class="table-item-select table-item-select-all"></button></td>
            <td width="20%">Title</td>
            <td width="20%">Code</td>
            <td width="14%">Price</td>
            <td width="15%">on since</td>
            <td width="15%">on until</td>
            <td width="10%">Status</td>
            <td width="3%"></td>
        </thead>
        <tbody>
            <?php for($i = 0; $i<5; $i++): ?>
            <tr class="villa-item" data-id="1">
                <td width="3%"><button href class="table-item-select table-item-select-single"></button></td>
                <td class="title">Beautiful Villa</td>
                <td class="url">VCAN001</td>
                <td class="created">IDR 9,350,000,000</td>
                <td class="status">2015-12-21</td>
                <td class="status">2016-12-20</td>
                <td class="author">ENABLED</td>
                <td class="table-item-options">
                    <button class="table-item-more"><i class="material-icons">more_horiz</i></button>
                    <ul class="table-item-menu">
                        <li><button href class="item-edit">edit</button></li>
                        <li><button href class="item-duplicate">duplicate</button></li>
                        <li><button href class="item-delete">delete</button></li>
                    </ul>
                </td>
            </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="blog-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'blog-form')) !!}
    <h3>Add Blog</h3>
    <div id="expandable-textarea" class="flexbox justify-between">
        <div class="m-input-wrapper" id="picture-wrapper">
            <div class="m-image-preview" id="blog-image-preview">
                <p class="drop-hint picture-preview-hint">drop blog header here</p>
            </div>
            <input class="m-image-input" type="file" name="media" id="blog-input-image" required>
        </div>

        <div class="input-group head">

            <div class="m-input-group m-input-group-half justify-between">

                <div class="m-input-wrapper">
                    <input type="text" name="title" id="blog-input-title" class="bind-input-from" data-target="#blog-input-url" required>
                    <label for="title">title</label>
                </div>

                <div class="m-input-wrapper">
                    <input type="text" name="url" id="blog-input-url" required>
                    <label for="url">url</label>
                </div>
            </div>

            <div class="m-input-group m-input-group-third justify-between">

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="blog-input-lang" name="lang" required>
                        <option value="en" selected>english</option>
                        <option value="fr">french</option>
                    </select>
                    <label for="lang">lang</label>
                </div>

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="blog-input-status" name="status" required>
                        <option value="1" selected>enable</option>
                        <option value="0">disable</option>
                    </select>
                    <label for="status">status</label>
                </div>

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="blog-input-category" name="category" required>
                        <option value="1" selected>diving</option>
                        <option value="2">trips</option>
                        <option value="3">bali belly</option>
                    </select>
                    <label for="category">category</label>
                </div>
            </div>

            <div class="m-input-wrapper">
                <input type="text" id="blog-input-tags" name="tags" required>
                <label for="tags">tags</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" id="blog-input-meta_desc" name="meta_desc" required>
                <label for="meta_desc">short description</label>
            </div>
        </div>
    </div>

    <div class="m-input-group textarea flexbox flexbox-wrap">
        <h3 class="input-group-title">Content</h3>
        <div class="input-wrapper fwidth">
            <textarea name="content" id="blog-content" rows="5"></textarea>
        </div>
    </div>
    <input type="hidden" name="author" id="blog-input-admin" value="admin">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-blog-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-blog">save</a>
    </div>
    {!! Form::close() !!}
</div>
@stop

@section('scripts')

<script type="text/javascript">
    Matter.admin.blog();
</script>

@stop
