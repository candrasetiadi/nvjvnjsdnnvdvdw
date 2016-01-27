@extends('admin.master')
@section('page', 'categories')

@section('fab')

<m-fab salmon class="modal-open" data-target="#category-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')
<m-template list class="category-wrapper">

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
            <tr class="category-item" id="category-item-{{ $category->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="created_at">{{ $category->lang()->title }}</td>
                <td class="code">{{ $category->lang()->description }}</td>
                <td class="code">{{ $category->parentName() }}</td>
                <td button>
                    <m-table-list-more>
                        <i class="material-icons">more_horiz</i>
                        <m-list-menu data-id="{{ $category->id }}">
                            <m-list-menu-item edit data-source="category/get" data-function="populateCategoryEdit">EDIT</m-list-menu-item>
                            <m-list-menu-item translate data-function="populateCategoryTranslate">TRANSLATION</m-list-menu-item>
                            <m-list-menu-item delete data-url="category/destroy">DELETE</m-list-menu-item>
                        </m-list-menu>
                    </m-table-list-more>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-content">No categories defined yet. Create one now</p>

    @endif

</m-template>

@include('admin.fragments.pagination', ['paginator' => $categories])

@endsection


@section('modal')

<m-modal-wrapper id="category-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'category-form', 'data-function' => 'modalClose', 'data-url' => 'category/store')) !!}
    <h3>Add Category</h3>

    <m-input>
        <input type="text" id="category-input-title" name="title" required>
        <label for="category-input-title">Title</label>
    </m-input>

    <m-input-group textarea>
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description" id="category-input-description" rows="5"></textarea>
        </div>
    </m-input-group>

    <m-input select w50-6>
        <input type="text" select id="category-input-parent" name="parent" required>
        <label for="category-input-parent">parent category</label>
        <m-select>
            @foreach($categories as $category)
            <m-option value="{{ $category->id }}" selected>{{ $category->lang()->title }}</m-option>
            @endforeach
        </m-select>
    </m-input>

    <input type="hidden" name="author" id="account-input-admin" value="admin">
    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain modal-close>cancel</m-button>
        <m-button plain save-form>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>


<!-- MODAL TRANSLATE -->

<m-modal-wrapper id="category-translate">
    {!! Form::open(array('class' => 'modal-window', 'id' => 'category-translate-form', 'data-function' => 'modalClose', 'data-url' => 'category/translate/store')) !!}
    
    <!-- en -->
    <h3 class="input-group-title">English</h3>
    <div class="m-input-wrapper fwidth">
        <input type="text" name="title[en]" id="category-input-en-title" required>
        <label for="title">title</label>
    </div>

    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description[en]" id="category-input-en-description" rows="10" style="padding-top: 0"></textarea>
        </div>
    </div>
    <br><br><br>

    <!-- id -->
    <h3 class="input-group-title">Indonesian</h3>
    <div class="m-input-wrapper fwidth">
        <input type="text" name="title[id]" id="category-input-id-title" required>
        <label for="title">title</label>
    </div>

    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description[id]" id="category-input-id-description" rows="10" style="padding-top: 0"></textarea>
        </div>
    </div>
    <br><br><br>

    <!-- fr -->
    <h3 class="input-group-title">French</h3>
    <div class="m-input-wrapper fwidth">
        <input type="text" name="title[fr]" id="category-input-fr-title" required>
        <label for="title">title</label>
    </div>

    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description[fr]" id="category-input-fr-description" rows="10" style="padding-top: 0"></textarea>
        </div>
    </div>
    <br><br><br>

    <!-- ru -->
    <h3 class="input-group-title">Rusian</h3>
    <div class="m-input-wrapper fwidth">
        <input type="text" name="title[ru]" id="category-input-ru-title" required>
        <label for="title">title</label>
    </div>

    <div class="m-input-group textarea fwidth flexbox flexbox-wrap">
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description[ru]" id="category-input-ru-description" rows="10" style="padding-top: 0"></textarea>
        </div>
    </div>
    <br><br><br>
    <input type="hidden" name="edit_translate" value="0" id="edit-translate-flag">

    <m-buttons flexbox justify-end>
        <m-button plain class="modal-close" id="close-category-translate-form">cancel</m-button>
        <m-button save-form plain>save</m-button>
    </m-buttons>
    {!! Form::close() !!}
</m-modal-wrapper>
@stop

@section('scripts')

<script>
    Matter.admin.categories();
</script>

@endsection
