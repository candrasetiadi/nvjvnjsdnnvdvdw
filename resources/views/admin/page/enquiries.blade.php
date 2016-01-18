@extends('admin.master')
@section('page', 'enquiry')

@section('content')
<div class="enquiry-wrapper flexbox flexbox-wrap">

    @if(count($enquiries) != 0)
    <table class="m-table-list enquiry-table">
        <thead>
            <td width="3%"><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="20%">customer</td>
            <td width="20%">enquired</td>
            <td width="14%">city</td>
            <td width="15%">country</td>
            <td width="15%" class="align-center">items</td>
            <td width="10%" class="align-center">status</td>
            <td width="3%"></td>
        </thead>
        <tbody>
            @foreach($enquiries as $enquiry)
            <tr class="enquiry-item" data-id="{{ $enquiry->id }}">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="{{ $enquiry->id }}"><i class="m-checkbox"></i></a></td>
                <td class="name">{{ $enquiry->customer->name }}</td>
                <td class="posted">{{ $enquiry->created_at }}</td>
                <td class="city">{{ $enquiry->city }}</td>
                <td class="country">{{ $enquiry->country }}</td>
                <td class="items align-center">{{ count($enquiry->cart) }}</td>
                <td class="status align-center">{{ $enquiry->status == 0 ? 'OPEN' : 'CLOSED' }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option"><ul>
                        <li><a href="{{ $enquiry->id }}" class="enquiry-view">view</a></li>
                        <li><a href="/system/ajax/enquiry/destroy/{{ $enquiry->id }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="enquiry-message">No enquiries submitted yet.</p>

    @endif

</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="enquiry-view">

    <form class="modal-window" id="enquiry-view">
        <h3>view enquiry</h3>
        <div class="m-input-group fwidth flexbox-wrap justify-between" id="enquiry-viewer" style="padding-bottom: 16px;">

        </div>

        <div class="button-holder align-right">
            <a href class="md-button md-button-plain modal-close">close</a>
            <a href class="md-button md-button-plain" id="enquiry-email-button">email</a>
            <a href class="md-button md-button-blue" id="enquiry-replied">mark as replied</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.enquiries();
</script>

@endsection
