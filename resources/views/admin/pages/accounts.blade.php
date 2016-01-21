@extends('admin.master')
@section('page', 'accounts')

@section('fab')

<m-fab salmon class="modal-open" data-target="#account-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')

<m-template list class="flexbox flexbox-wrap">

    <table>
        <thead>
            <tr>
                <td width="5%">
                    <m-list-item-check all></m-list-item-check>
                </td>
                <td width="20%">name</td>
                <td width="20%">location</td>
                <td width="15%" class="align-center">ip address</td>
                <td width="20%" class="align-center">created</td>
                <td width="15%" class="align-center">status</td>
                <td width="5%"></td>
            </tr>
        </thead>

        <tbody>
           <?php for($i = 0; $i <= 11; $i++): ?>
            <tr>
                <td>
                    <m-list-item-check single data-id=""></m-list-item-check>
                </td>
                <td>Boris Lemke</td>
                <td>Denpasar, Bali</td>
                <td class="align-center">192.0.0.1</td>
                <td class="align-center">Jan 20, 2016</td>
                <td class="align-center">ENABLED</td>
                <td>
                    <m-table-list-more>

                    </m-table-list-more>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</m-template>

@stop

@section('modal')

<m-modal-wrapper id="account-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'account-form')) !!}
    <h3>Add account</h3>
    <div id="expandable-textarea" class="flexbox justify-between">
        <div class="m-input-wrapper" id="picture-wrapper">
            <div class="m-image-preview" id="account-image-preview">
                <p class="drop-hint picture-preview-hint">drop account header here</p>
            </div>
            <input class="m-image-input" type="file" name="media" id="account-input-image" required>
        </div>

        <div class="input-group head">

            <div class="m-input-group m-input-group-half justify-between">

                <m-input>
                    <input type="text" name="title" id="account-input-title" class="bind-input-from" data-target="#account-input-url" required>
                    <label for="title">title</label>
                </m-input>

                <m-input>
                    <input type="text" name="url" id="account-input-url" required>
                    <label for="url">url</label>
                </m-input>
            </div>

            <div class="m-input-group m-input-group-third justify-between">

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="account-input-lang" name="lang" required>
                        <option value="en" selected>english</option>
                        <option value="fr">french</option>
                    </select>
                    <label for="lang">lang</label>
                </div>

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="account-input-status" name="status" required>
                        <option value="1" selected>enable</option>
                        <option value="0">disable</option>
                    </select>
                    <label for="status">status</label>
                </div>

                <div class="m-input-wrapper m-input-wrapper-select">
                    <select id="account-input-category" name="category" required>
                        <option value="1" selected>diving</option>
                        <option value="2">trips</option>
                        <option value="3">bali belly</option>
                    </select>
                    <label for="category">category</label>
                </div>
            </div>

            <div class="m-input-wrapper">
                <input type="text" id="account-input-tags" name="tags" required>
                <label for="tags">tags</label>
            </div>

            <div class="m-input-wrapper">
                <input type="text" id="account-input-meta_desc" name="meta_desc" required>
                <label for="meta_desc">short description</label>
            </div>
        </div>
    </div>

    <div class="m-input-group textarea flexbox flexbox-wrap">
        <h3 class="input-group-title">Content</h3>
        <div class="input-wrapper fwidth">
            <textarea name="content" id="account-content" rows="5"></textarea>
        </div>
    </div>
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

<script type="text/javascript">
    Matter.admin.account();
</script>

@stop
