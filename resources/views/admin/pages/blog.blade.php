@extends('admin.master')
@section('page', 'blog')

@section('fab')

<m-fab salmon class="modal-open" data-target="#blog-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')
<m-template list class="blogs-wrapper">

    @if(isset($blogs) AND count($blogs) > 0)
    <table>
        <thead>
            <td width="5%">
                <m-list-item-check all></m-list-item-check>
            </td>
            <td width="20%">Title</td>
            <td width="20%">Code</td>
            <td width="14%">Price</td>
            <td width="15%">on since</td>
            <td width="15%">on until</td>
            <td width="10%">Status</td>
            <td width="3%"></td>
        </thead>

        <tbody>
            @foreach($blogs as $blog)
            <tr class="property-item" id="property-item-{{ $blog->id }}">
                <td width="5%">
                    <m-list-item-check single data-id="{{ $blog->id }}"></m-list-item-check>
                </td>
                <td class="title">{{ $blog->title }}</td>
                <td class="url">{{ $blog->url }}</td>
                <td class="created">{{ $blog->author }}</td>
                <td class="status">{{ $blog->views }}</td>
                <td class="status">{{ $blog->created_at }}</td>
                <td class="author">{{ $blog->status }}</td>
                <td class="table-item-options">
                    <button class="table-item-more"><i class="material-icons">more_horiz</i></button>
                    <ul class="table-item-menu">
                        <li><button href class="item-edit">edit</button></li>
                        <li><button href class="item-delete">delete</button></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-content">No blogs posted yet. Create one now</p>

    @endif

</m-template>

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

            <m-input-group class="m-input-group m-input-group-third" justify-between>

                <m-input fwidth select w33-8>
                    <input type="text" select id="blog-input-lang" name="lang" value="en" required>
                    <label for="blog-input-lang">lang</label>
                    <m-select>
                        <m-option value="en">english</m-option>
                        <m-option value="fr">french</m-option>
                    </m-select>
                </m-input>

                <m-input fwidth select w33-8>
                    <input type="text" select id="blog-input-status" name="status" value="en" required>
                    <label for="blog-input-status">status</label>
                    <m-select>
                        <m-option value="1">enable</m-option>
                        <m-option value="0">disable</m-option>
                    </m-select>
                </m-input>

                <m-input fwidth select w33-8>
                    <input type="text" select id="blog-input-category" name="category" value="1" required>
                    <label for="blog-input-category">category</label>
                    <m-select>
                        <m-option value="1">diving</m-option>
                        <m-option value="2">trips</m-option>
                        <m-option value="3">bali belly</m-option>
                    </m-select>
                </m-input>
            </m-input-group>

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
