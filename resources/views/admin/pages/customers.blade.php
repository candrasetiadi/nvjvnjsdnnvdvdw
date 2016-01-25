@extends('admin.master')
@section('page', 'customers')

@section('fab')

<m-fab salmon class="modal-open" data-target="#customer-add"><i class="material-icons">add</i></m-fab>

<!-- <a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#customer-add"><i class="material-icons">add</i></a> -->

@stop

@section('content')
<m-template list>

    <m-action-bar class="flexbox fwidth">
        <m-input class="w33" id="action-search-wrapper">
            <input type="text" ajax-search data-source="customers/search" data-function="populateCustomersSearch" required>
            <i class="material-icons">search</i>
        </m-input>
    </m-action-bar>

    <table class="m-table-list customers-table">
        <thead>
            <td width="3%"><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="22%">name</td>
            <td width="19%">phone</td>
            <td width="19%">email</td>
            <td width="15%">city</td>
            <td width="15%">country</td>
            <td width="15%">registered</td>
            <td width="15%" class="align-center">status</td>
            <td width="3%"></td>
        </thead>

        <tbody>
            @foreach($customers as $customer)
            <tr class="customer-item" data-id="{{ $customer->id }}">
                <td class="select">
                    <m-list-item-check class="single" data-id="{{ $customer->id }}"></m-list-item-check>
                </td>
                <td>{{ $customer->firstname . ' ' . $customer->lastname }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->country }}</td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                <td class="status align-center">{{ $customer->active ? 'active' : 'not yet'}}</td>                
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="{{ $customer->id }}"><ul>
                        <li><a href="{{ $customer->id }}" class="item-edit">edit</a></li>
                        <li><a href="{{ url('system/ajax/customer/delete/' . $customer->id) }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</m-template>

@include('admin.fragments.pagination', ['paginator' => $customers])

@endsection

@section('modal')

<m-modal-wrapper id="customer-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'customer-form', 'data-function' => 'modalClose', 'data-url' => 'customer/store')) !!}
    <h3>Add customer</h3>
    <m-input-group class="m-input-group fwidth flexbox-wrap justify-between">

        <m-input class="w50-6">
            <input type="text" name="firstname" id="customer-input-firstname" required>
            <label for="firstname">firstname</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="lastname" id="customer-input-lastname" required>
            <label for="lastname">lastname</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="email" id="customer-input-email" required>
            <label for="email">email</label>
        </m-input>

        <m-input class="w50-6">
            <input type="text" name="password" id="customer-input-password" required>
            <label for="password">password</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="phone" id="customer-input-phone" required>
            <label for="phone">phone</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="address" id="customer-input-address" required>
            <label for="address">address</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="city" id="customer-input-city" required>
            <label for="city">city</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="province" id="customer-input-province" required>
            <label for="province">state</label>
        </m-input>

        <m-input class="w33-8">
            <input type="text" name="zipcode" id="customer-input-zipcode" required>
            <label for="zipcode">postal</label>
        </m-input>

        <m-input select class="w33-8">
            <input type="text" select id="blog-input-country" name="country" value="available" required>
            <label for="country">country</label>
            <m-select>
                @foreach(\App\Country::all() as $country)
                <m-option value="{{ $country->nicename }}">{{ $country->nicename }}</m-option>
                @endforeach
            </m-select>
        </m-input>

    </m-input-group>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain class="modal-close">cancel</m-button>
        <m-button save-form plain>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@endsection

@section('scripts')

<script>
    Matter.admin.customers();
</script>

@endsection
