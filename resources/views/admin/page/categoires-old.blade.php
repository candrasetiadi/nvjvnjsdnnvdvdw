@extends('admin.master')
@section('page', 'categories')

@section('content')

<div class="categories-header">
    <ul class="flexbox">
        <li>Collection</li>
        <li>Group</li>
        <li>Category</li>
        <li>Subcategory</li>
    </ul>
</div>

<?php

//echo '<pre>'; var_dump($bundle); echo '</pre>'; die();

$groups = '';
$catByGroup = '';
$subByCat = '';

foreach($navigation as $group) {

    $groups .= '<li><a href class="group-item" data-id="' . $group->id . '">' . $group->data->title . '</a></li>';

    $catByGroup .= '<ul data-parent="' . $group->id . '">';

    if(isset($group->categories)) {

        foreach($group->categories as $cat) {

            $catByGroup .= '<li><a class="cat-item subcategory" href data-id="' . $cat->id . '">' . $cat->title  '</a></li>';

            $subByCat .= '<ul data-parent="' . $cat->id . '">';

            if(isset($cat->subcategories)) {

                foreach($cat->subcategories as $sub) {

                    $subByCat .= '<li><a class="sub-item' . '" href data-id="' . $sub->id . '">' . $sub->title . '</a></li>';
                }

            } else {

                $subByCat .= '<li class="no-content">No subcategory associated defined</li>';
            }

            //if($cat['child_type'] == 'subcategory') $subByCat .= '<li class="md-li"><a href class="md-button md-button-salmon shadow-hover add-subcategory modal-open" data-target="#register-subcategory" data-parent="5">add subcategory</a></li>';

            $subByCat .= '</ul>';
        }

    } else {

        $catByGroup .= '<li class="no-content">No categories defined</li>';
    }

    $catByGroup .= '<li class="md-li"><a href class="md-button md-button-salmon shadow-hover add-category modal-open" data-target="#register-category" data-parent="' . $groupId . '">add category</a></li>';

    $catByGroup .= '</ul>';
}

?>

<div class="categories-wrapper flexbox">

    <div class="categories-group categories-group-main">
        <ul>
            <li>
                <div class="m-input-wrapper m-input-wrapper-select" style="margin: 32px 0 0 0;">
                    <select id="group-select" required>
                        @foreach($navigation as $group)
                        <option value="{{ $group->id }}" selected>{{ $group->data->title }}</option>
                        @endforeach
                    </select>
                    <label for="group-select">group</label>
                </div>
            </li>
            <li class="md-li"><a href class="md-button md-button-salmon shadow-hover add-group modal-open" data-target="#register-group">add group</a></li>
        </ul>
    </div>

    <div class="categories-group categories-group-expand categories-group-sub">
        <ul>
            <li>
                <div class="m-input-wrapper m-input-wrapper-select" style="margin: 32px 0 0 0;">
                    <select id="group-select" required>
                        @foreach($navigation as $group)
                        <option value="{{ $group->id }}" selected>{{ $group->data->title }}</option>
                        @endforeach
                    </select>
                    <label for="group-select">group</label>
                </div>
            </li>
            <li class="md-li"><a href class="md-button md-button-salmon shadow-hover add-group modal-open" data-target="#register-group">add group</a></li>
        </ul>
    </div>

    <div class="categories-group categories-group-expand categories-group-grand">
        <ul>
            <li>
                <div class="m-input-wrapper m-input-wrapper-select" style="margin: 32px 0 0 0;">
                    <select id="group-select" required>
                        @foreach($navigation as $group)
                        <option value="{{ $group->id }}" selected>{{ $group->data->title }}</option>
                        @endforeach
                    </select>
                    <label for="group-select">group</label>
                </div>
            </li>
            <li class="md-li"><a href class="md-button md-button-salmon shadow-hover add-group modal-open" data-target="#register-group">add group</a></li>
        </ul>
    </div>

    <div class="categories-group categories-group-expand categories-group-content">
        <ul>
            <li><a href="">Lorem ipsum.</a></li>
            <li><a href="">Lorem ipsum.</a></li>
            <li><a href="">Lorem ipsum.</a></li>
            <li><a href="">Lorem ipsum.</a></li>
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

        <div class="register-nav-lang-gallery">

            <div class="register-nav-lang-switcher flexbox justify-end">
                <a href class="nav-lang-switcher active">english</a>
                <a href class="nav-lang-switcher">french</a>
            </div>

            <div class="register-nav-lang-slider flexbox">
                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_en" class="bind-input-from" id="title_en_input_group" data-target="#url_en_input_group" required>
                        <label for="title_en">group title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_en" id="url_en_input_group" required>
                        <label for="url_en">group url</label>
                    </div>
                </div>

                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_fr" class="bind-input-from" id="title_fr_input_group" data-target="#url_fr_input_group" required>
                        <label for="title_fr">group title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_fr" id="url_fr_input_group" required>
                        <label for="url_fr">group url</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-input-wrapper m-input-wrapper-select w50">
            <select id="status_input_group" name="status" required>
                <option value="1" selected>enable</option>
                <option value="0">disable</option>
            </select>
            <label for="status">status</label>
        </div>
        <input type="hidden" class="edit-flags" id="group-edit-flag" name="edit" value="0">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain" id="delete-group" data-id="">delete</a>
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
            <div class="m-image-preview" id="image_input_cat">
                <p class="drop-hint">drop category thumbnail here</p>
            </div>
            <input class="m-image-input" type="file" name="image" required>
        </div>

        <div class="register-nav-lang-gallery">

            <div class="register-nav-lang-switcher flexbox justify-end">
                <a href class="nav-lang-switcher active">english</a>
                <a href class="nav-lang-switcher">french</a>
            </div>

            <div class="register-nav-lang-slider flexbox">
                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_en" class="bind-input-from" id="title_en_input_cat" data-target="#url_en_input_cat" required>
                        <label for="title_en">category title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_en" id="url_en_input_cat" required>
                        <label for="url_en">category url</label>
                    </div>
                </div>

                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_fr" class="bind-input-from" id="title_fr_input_cat" data-target="#url_fr_input_cat" required>
                        <label for="title_fr">category title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_fr" id="url_fr_input_cat" required>
                        <label for="url_fr">category url</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-input-wrapper m-input-wrapper-select status-wrapper">
            <select id="status_input_cat" name="status" required>
                <option value="1" selected>enable</option>
                <option value="0">disable</option>
            </select>
            <label for="status">status</label>
        </div>

        <div class="register-nav-child-bundle flexbox justify-between">
            <div class="m-input-wrapper m-input-wrapper-select">
                <select id="child_type_input_cat" name="child_type" required>
                    <option value="subcategory" selected>subcategory</option>
                    <option value="trip">trip page</option>
                    <option value="event">event page</option>
                </select>
                <label for="child_type">child type</label>
            </div>

            <div class="m-input-wrapper m-input-wrapper-select" id="hide-by-">
                <select id="child_input_cat" name="child" required>
                    <option selected disabled>select a page</option>
                    <option value="placeholder">placeholder</option>
                </select>
                <label for="child">child</label>
            </div>
        </div>
        <input type="hidden" class="edit-flags" id="cat-edit-flag" name="edit" value="0">
        <input type="hidden" id="category_parent" name="parent" value="0">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain" id="delete-category" data-id="">delete</a>
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
            <div class="m-image-preview" id="image_input_subcat">
                <p class="drop-hint">drop subcategory thumbnail here</p>
            </div>
            <input class="m-image-input" type="file" name="image" required>
        </div>

        <div class="register-nav-lang-gallery">

            <div class="register-nav-lang-switcher flexbox justify-end">
                <a href class="nav-lang-switcher active">english</a>
                <a href class="nav-lang-switcher">french</a>
            </div>

            <div class="register-nav-lang-slider flexbox">
                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_en" class="bind-input-from" id="title_en_input_subcat" data-target="#url_en_input_subcat" required>
                        <label for="title_en">subcategory title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_en" id="url_en_input_subcat" required>
                        <label for="url_en">subcategory url</label>
                    </div>
                </div>

                <div class="register-nav-lang-bundle">
                    <div class="m-input-wrapper">
                        <input type="text" name="title_fr" class="bind-input-from" id="title_fr_input_subcat" data-target="#url_fr_input_subcat" required>
                        <label for="title_fr">subcategory title</label>
                    </div>

                    <div class="m-input-wrapper">
                        <input type="text" name="url_fr" id="url_fr_input_subcat" required>
                        <label for="url_fr">subcategory url</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-input-wrapper m-input-wrapper-select status-wrapper">
            <select id="status_input_subcat" name="status" required>
                <option value="1" selected>enable</option>
                <option value="0">disable</option>
            </select>
            <label for="status">status</label>
        </div>

        <div class="register-nav-child-bundle flexbox justify-between">
            <div class="m-input-wrapper m-input-wrapper-select">
                <select id="child_type_input_subcat" name="child_type" required>
                    <option value="trip" selected>trip page</option>
                    <option value="event">event page</option>
                </select>
                <label for="child_type">child type</label>
            </div>

            <div class="m-input-wrapper m-input-wrapper-select">
                <select id="child_input_subcat" name="child" required>
                    <option value="placeholder" selected>placeholder</option>
                </select>
                <label for="child">child</label>
            </div>
        </div>
        <input type="hidden" class="edit-flags" id="subcat-edit-flag" name="edit" value="0">
        <input type="hidden" id="subcategory_parent" name="parent" value="0">
        {!! Form::close() !!}

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain" id="delete-subcategory" data-id="">delete</a>
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
