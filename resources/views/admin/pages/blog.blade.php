@extends('admin.master')
@section('page', 'blog')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#blog-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="blog-wrapper flexbox flexbox-wrap">


    @if(count($blogs) != 0)

    <table class="m-table-list blogs-table">
        <thead>
            <td width="3%"><a href class="m-table-list-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="20%">Title</td>
            <td width="20%">URL</td>
            <td width="14%">Author</td>
            <td width="15%">Created</td>
            <td width="15%">Updated</td>
            <td width="10%">Status</td>
            <td width="3%"></td>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr class="list-item blog-item" data-id="{{ $blog->id }}">
                <td class="blog-select"><a href class="m-table-list-item-select m-table-item-select-single" data-id="{{ $blog->id }}"><i class="m-checkbox"></i></a></td>
                <td class="blog-title">{{ $blog->title }}</td>
                <td class="blog-url">{{ $blog->url }}</td>
                <td class="blog-created">{{ $blog->author }}kesato</td>
                <td class="blog-status">{{ $blog->created_at }}</td>
                <td class="blog-status">{{ $blog->updated_at }}</td>
                <td class="blog-author{{ $blog->status ? 'ENABLED' : 'DISABLED' }}">{{ $blog->status ? 'ENABLED' : 'DISABLED' }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="1"><ul>
                        <li><a href="{{ $blog->id }}" class="item-edit">edit</a></li>
                        <li><a href="/system/ajax/blog/delete/{{ $blog->id }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-message">No blog posts found. Create one now</p>

    @endif

</div>

@stop

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
