@extends('admin.master')
@section('page', 'categories')

@section('fab')

<m-fab salmon class="modal-open" data-target="#category-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')
<div class="category-wrapper flexbox flexbox-wrap">

    @if(isset($categories) AND count($categories) > 0)

    <table class="m-table-list category-table">
        <thead>
            <td><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td>Title</td>
            <td>Description</td>
            <td>Parent</td>
            <td>Action</td>

        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="category-item" data-id="{{ $category->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="created_at">{{ $category->lang()->title }}</td>
                <td class="code">{{ $category->lang()->description }}</td>
                <td class="code">{{ $category->parent }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="{{ $category->id }}"><ul>
                        <li><a href="{{ $category->id }}" class="item-edit">edit</a></li>
                        <li><a href="{{ url('system/ajax/category/delete/' . $category->id) }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-content">No categories defined yet. Create one now</p>

    @endif

</div>

@include('admin.fragments.pagination', ['paginator' => $categories])

@endsection


@section('modal')

<m-modal-wrapper id="category-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'category-form', 'data-function' => 'modalClose', 'data-url' => 'category/store')) !!}
    <h3>Add Category</h3>

    <m-input>
        <input type="text" id="category-title" name="title" required>
        <label for="title">Title</label>
    </m-input>

    <m-input-group textarea>
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description" id="category-description" rows="5"></textarea>
        </div>
    </m-input-group>
    <input type="hidden" name="author" id="account-input-admin" value="admin">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain modal-close>cancel</m-button>
        <m-button plain save-form>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@stop

@section('scripts')

<script>
    Matter.admin.categories();
</script>

@endsection
