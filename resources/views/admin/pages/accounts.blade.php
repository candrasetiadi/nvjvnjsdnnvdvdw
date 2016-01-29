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
                <td width="20%">username</td>
                <td width="20%">email</td>
                <td width="15%">location</td>
                <td width="15%" class="align-center">role</td>
                <td width="5%" class="align-center">status</td>
                <td width="5%">action</td>
            </tr>
        </thead>

        <tbody>
            @foreach($accounts as $account)
            <tr class="account-item" id="account-item-{{ $account->id }}">
                <td>
                    <m-list-item-check single data-id="{{ $account->id }}"></m-list-item-check>
                </td>
                <td>{{ $account->firstname . ' ' . $account->lastname }}</td>
                <td>{{ $account->username }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->city }}</td>
                <td class="align-center">{{ strtoupper($account->role->name) }}</td>
                <td class="align-center">{{ $account->active ? 'ACTIVE' : 'NONE' }}</td>
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

        <m-input fwidth select data-label="role">
            <input type="text" select id="account-input-role" name="role" required>
            <label for="account-input-role">select a role</label>
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


<!-- EDIT -->
<m-modal-wrapper id="account-edit">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'account-update-form', 'data-function' => 'modalClose', 'data-url' => 'account/update')) !!}
    <h3>Edit account</h3>
    <m-input-group class="m-input-group fwidth flexbox-wrap justify-between">

        <m-input class="w50-6">
            <input type="text" name="username" id="accounts-input-username" required>
            <label for="username">username</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="password" id="accounts-input-password" required>
            <label for="password">password</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="firstname" id="accounts-input-firstname" required>
            <label for="firstname">firstname</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="lastname" id="accounts-input-lastname" required>
            <label for="lastname">lastname</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="email" id="accounts-input-email" required>
            <label for="email">email</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="phone" id="accounts-input-phone" required>
            <label for="phone">phone</label>
        </m-input>

        <m-input class="w66-8">
            <input type="text" name="address" id="accounts-input-address" required>
            <label for="address">address</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="city" id="accounts-input-city" required>
            <label for="city">city</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="province" id="accounts-input-province" required>
            <label for="province">state</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="zipcode" id="accounts-input-zipcode" required>
            <label for="zipcode">postal</label>
        </m-input>

        <m-input data-label="country" select data-label="country" class="w33-8">
            <input type="text" select id="accounts-input-country" name="country" value="" required>
            <label for="accounts-input-country">country</label>
            <m-select>
                @foreach(\App\Country::all() as $country)
                <m-option value="{{ $country->nicename }}">{{ $country->nicename }}</m-option>
                @endforeach
            </m-select>
        </m-input>

        <m-input data-label="branch" select data-label="branch" class="w33-8">
            <input type="text" select id="accounts-input-branch_id" name="branch_id" value="" required>
            <label for="accounts-input-branch_id">branch</label>
            <m-select>
                @foreach(\App\Branch::all() as $branch)
                <m-option value="{{ $branch->id }}">{{ $branch->name }}</m-option>
                @endforeach
            </m-select>
        </m-input>

        <m-input data-label="role" select data-label="role" class="w33-8">
            <input type="text" select id="accounts-input-role_id" name="role_id" value="" required>
            <label for="accounts-input-role_id">role</label>
            <m-select>
                @foreach(\App\Role::all() as $role)
                <m-option value="{{ $role->id }}">{{ $role->name }}</m-option>
                @endforeach
            </m-select>
        </m-input>

        <m-input data-label="active" select class="w33-8">
            <input type="text" select id="accounts-input-active" name="active" value="1" required>
            <label for="accounts-input-active">active</label>
            <m-select>
                <m-option value="1">yes</m-option>
                <m-option value="0">no</m-option>
            </m-select>
        </m-input>

    </m-input-group>

    <input type="hidden" name="user_id" id="accounts-input-id">

    <div class="button-holder align-right">
        <m-button plain class="modal-close">cancel</m-button>
        <m-button update-form plain>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@stop

@section('scripts')
<script type="text/javascript">
    Matter.admin.accounts();
</script>
@stop
