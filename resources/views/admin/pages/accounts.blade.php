@extends('admin.master')
@section('page', 'accounts')

@section('fab')

<m-fab salmon class="modal-open" data-target="#account-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')

<m-template list class="flexbox flexbox-wrap">

    @if(isset($accounts) AND count($accounts) > 0)

    <table>
        <thead>
            <tr>
                <td width="5%">
                    <m-list-item-check all></m-list-item-check>
                </td>
                <td width="20%">name</td>
                <td width="20%">email</td>
                <td width="15%">location</td>
                <td width="15%" class="align-center">created</td>
                <td width="15%" class="align-center">role</td>
                <td width="5%" class="align-center">status</td>
                <td width="5%"></td>
            </tr>
        </thead>

        <tbody>
            @foreach($accounts as $account)
            <tr class="account-item" id="account-item-{{ $account->id }}">
                <td>
                    <m-list-item-check single data-id="{{ $account->id }}"></m-list-item-check>
                </td>
                <td>{{ $account->username }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->city }}</td>
                <td class="align-center">{{ $account->created_at }}</td>
                <td class="align-center">{{ strtoupper($account->role->name) }}</td>
                <td class="align-center">{{ $account->active ? 'ACTIVE' : 'UNREGISTERED' }}</td>                
                <td button>
                    <m-table-list-more>
                        <i class="material-icons">more_horiz</i>
                        <m-list-menu data-id="{{ $account->id }}">
                            <m-list-menu-item edit data-source="account/get" data-function="populateAccountEdit">EDIT</m-list-menu-item>
                            <m-list-menu-item delete data-url="account/destroy">DELETE</m-list-menu-item>
                        </m-list-menu>
                    </m-table-list-more>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-content">No accounts created yet. Create one now</p>

    @endif

</m-template>

@include('admin.fragments.pagination', ['paginator' => $accounts])

@stop

@section('modal')

<m-modal-wrapper id="account-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'account-form', 'data-function' => 'doNothing', 'data-url' => 'account/prepare', 'style' => 'max-width: 400px')) !!}
    <h3>Add account</h3>

    <m-error-dialog hidden>
        <m-error-message>Warning! Super Admin access gives full permission to the system including deletion action of any removable data which may be valuable.</m-error-message>
    </m-error-dialog>

    <m-input-group justify-between>

        <m-input fwidth select>
            <input type="text" select id="account-input-role" name="role" required>
            <label for="account-input-role">role</label>
            <m-select>
                @foreach(\App\Role::all() as $role)
                <m-option class="role-option" id="super-role" value="{{ $role->id }}">{{ $role->name }}</m-option>
                @endforeach
            </m-select>
        </m-input>

        <m-input fwidth>
            <input type="text" id="account-input-email" name="email" required>
            <label for="email">email</label>
        </m-input>

        <m-input-desc>
            The email addressee wil receive an email with a random generated password to create an account. Please be aware that you are giving them access to your content management system.
        </m-input-desc>
    </m-input-group>

    <input type="hidden" name="creator" id="account-input-admin" value="admin">

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
