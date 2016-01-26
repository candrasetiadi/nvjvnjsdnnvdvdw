@extends('admin.master')
@section('page', 'enquiries')

@section('fab')

<m-fab salmon class="modal-open" data-target="#enquiry-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')
<m-template list class="inquiry-wrapper">

    <table class="m-table-list enquiry-table">
        <thead>
            <td><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td>Property</td>
            <td>Subject</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Action</td>

        </thead>
        <tbody>
            @foreach($enquiries as $inquiry)            
            <tr class="inquiry-item" data-id="{{ $inquiry->id }}" id="inquiry-item-{{ $inquiry->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="property">{{ $inquiry->property ? $inquiry->property->lang()->title : '-' }}</td>
                <td class="subject">{{ $inquiry->subject }}</td>
                <td class="name">{{ $inquiry->firstname . ' ' . $inquiry->lastname }}</td>
                <td class="phone">{{ $inquiry->phone }}</td>
                <td class="email">{{ $inquiry->email }}</td>
                <!-- <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="{{ $inquiry->id }}"><ul>
                        <li><a href="{{ $inquiry->id }}" class="item-edit">edit</a></li>
                        <li><a href="{{ url('system/ajax/inquiry/delete/' . $inquiry->id) }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td> -->

                <td button>
                    <m-table-list-more>
                        <i class="material-icons">more_horiz</i>
                        <m-list-menu data-id="{{ $inquiry->id }}">
                            <m-list-menu-item edit data-source="inquiry/get" data-function="populateInquiryEdit">EDIT</m-list-menu-item>
                            <m-list-menu-item delete data-url="inquiry/destroy">DELETE</m-list-menu-item>
                        </m-list-menu>
                    </m-table-list-more>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</m-template>

@include('admin.fragments.pagination', ['paginator' => $enquiries])

@endsection


@section('modal')

<m-modal-wrapper id="enquiry-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'enquiry-form', 'data-function' => 'modalClose', 'data-url' => 'inquiry/store')) !!}
    <h3>Add enquiry</h3>


    <m-input select>
        <input type="text" select id="blog-input-lang" name="customer_id" value="available" required>
        <label for="blog-input-lang">Customers</label>
        <m-select>

            @foreach(\App\Customer::orderBy('firstname', 'asc')->get() as $customer)
            <m-option value="{{ $customer->id }}">{{ $customer->firstname }}</m-option>
            @endforeach

        </m-select>
    </m-input>

    <m-input select>
        <input type="text" select id="blog-input-lang" name="property_id" value="available" required>
        <label for="blog-input-lang">Properties</label>
        <m-select>

            @foreach(\App\Property::orderBy('created_at', 'desc')->get() as $property)
            <m-option value="{{ $property->id }}">{{ $property->lang()->title }}</m-option>
            @endforeach

        </m-select>
    </m-input>

    <m-input>
        <input type="text" id="enquiry-subject" name="subject" required>
        <label for="subject">Subject</label>
    </m-input>

    <m-input-group textarea>
        <h3 class="input-group-title">Content</h3>
        <div class="input-wrapper fwidth">
            <textarea name="content" id="enquiry-content" rows="5"></textarea>
        </div>
    </m-input-group>

    <m-input>
        <input type="text" id="enquiry-firstname" name="firstname" required>
        <label for="firstname">Firstname</label>
    </m-input>

    <m-input>
        <input type="text" id="enquiry-lastname" name="lastname" required>
        <label for="lastname">Lastname</label>
    </m-input>

    <m-input>
        <input type="text" id="enquiry-phone" name="phone" required>
        <label for="phone">Phone</label>
    </m-input>

    <m-input>
        <input type="text" id="enquiry-email" name="email" required>
        <label for="email">Email</label>
    </m-input>

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
    Matter.admin.inquiries();
</script>

@endsection
