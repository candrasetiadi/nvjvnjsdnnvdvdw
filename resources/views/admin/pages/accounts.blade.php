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
                <td width="20%">email</td>
                <td width="15%">location</td>
                <td width="20%" class="align-center">created</td>
                <td width="15%" class="align-center">role</td>
                <td width="5%"></td>
            </tr>
        </thead>

        <tbody>
            @foreach($accounts as $account)
            <tr>
                <td>
                    <m-list-item-check single data-id="{{ $account->id }}"></m-list-item-check>
                </td>
                <td>{{ $account->username }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->city }}</td>
                <td class="align-center">{{ $account->created_at }}</td>
                <td class="align-center">{{ $account->role_id }}</td>
                <td>
                    <m-table-list-more>

                    </m-table-list-more>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</m-template>

@stop

@section('modal')

<m-modal-wrapper id="account-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'account-form')) !!}
    <h3>Add account</h3>

    <m-input-group justify-between>

        <m-input w33-8 select>
            <input type="text" select id="account-input-role" name="role" required>
            <label for="account-input-role">role</label>
            <m-select>
                <m-option value="1">super admin</m-option>
                <m-option value="2">manager</m-option>
                <m-option value="3">agent</m-option>
            </m-select>
        </m-input>

        <m-input w33-8>
            <input type="text" id="account-input-email" name="email" required>
            <label for="email">email</label>
        </m-input>

        <m-input w33-8>
            <input type="text" id="account-input-tags" name="tags" required>
            <label for="tags">tags</label>
        </m-input>
    </m-input-group>

    <m-input>
        <input type="text" id="account-input-tags" name="tags" required>
        <label for="tags">tags</label>
    </m-input>

    <m-input>
        <input type="text" id="account-input-meta_desc" name="meta_desc" required>
        <label for="meta_desc">short description</label>
    </m-input>

    <m-input-group textarea>
        <h3 class="input-group-title">Content</h3>
        <div class="input-wrapper fwidth">
            <textarea name="content" id="account-content" rows="5"></textarea>
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

<script type="text/javascript">
    Matter.admin.accounts();
</script>

@stop
