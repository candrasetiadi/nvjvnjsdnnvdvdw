@extends('admin.master')
@section('page', 'enquiries')

@section('fab')

<m-fab salmon class="modal-open" data-target="#enquiry-add"><i class="material-icons">add</i></m-fab>

@stop

@section('content')
<div class="enquiry-wrapper flexbox flexbox-wrap">

    <table class="m-table-list enquiry-table">
        <thead>
            <td><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td>Subject</td>
            <td>Property</td>
            <td>Buyer Name</td>
            <td>Buyer Phone</td>
            <td>Buyer Email</td>
            <td>Date</td>
            <td>Action</td>

        </thead>
        <tbody>
            @foreach($enquiries as $enquiry)            
            <tr class="enquiry-item" data-id="{{ $enquiry->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="subject">{{ $enquiry->subject }}</td>
                <td class="property">{{ $enquiry->property->lang()->title }}</td>
                <td class="name">{{ $enquiry->firstname . ' ' . $enquiry->lastname }}</td>
                <td class="phone">{{ $enquiry->phone }}</td>
                <td class="email">{{ $enquiry->email }}</td>
                <td class="email">{{ $enquiry->created_at }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="{{ $enquiry->id }}"><ul>
                        <li><a href="{{ $enquiry->id }}" class="item-edit">edit</a></li>
                        <li><a href="{{ url('system/ajax/enquiry/delete/' . $enquiry->id) }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@include('admin.fragments.pagination', ['paginator' => $enquiries])

@endsection


@section('modal')

<m-modal-wrapper id="enquiry-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'enquiry-form', 'data-function' => 'modalClose', 'data-url' => 'enquiry/store')) !!}
    <h3>Add enquiry</h3>

    <m-input>
        <input type="text" id="enquiry-title" name="title" required>
        <label for="title">Title</label>
    </m-input>

    <m-input-group textarea>
        <h3 class="input-group-title">Description</h3>
        <div class="input-wrapper fwidth">
            <textarea name="description" id="enquiry-description" rows="5"></textarea>
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
    Matter.admin.enquiries();
</script>

@endsection
