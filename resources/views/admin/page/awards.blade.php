@extends('admin.master')
@section('page', 'award')

@section('fab')

<a href class="fab-button fab-button-salmon fab-button-action shadow-hover modal-open" data-target="#award-add"><i class="material-icons">add</i></a>

@stop

@section('content')
<div class="award-wrapper flexbox flexbox-wrap">


    @if(count($awards) != 0)
    <table class="m-table-list award-table">
        <thead>
            <td width="3%"><a href class="m-table-item-select m-table-item-select-all"><i class="m-checkbox"></i></a></td>
            <td width="74%">Title</td>
            <td width="10%" class="align-center">year</td>
            <td width="10%" class="align-center">month</td>
            <td width="3%"></td>
        </thead>
        <tbody>
            @foreach($awards as $award)
            <tr class="product-item" data-id="1">
                <td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="1"><i class="m-checkbox"></i></a></td>
                <td class="title">{{ $award->title }}</td>
                <td class="created align-center">{{ $award->year }}</td>
                <td class="updated align-center">{{ strtoupper(substr($award->month_text, 0, 3)) }}</td>
                <td class="m-table-item-options">
                    <a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>
                    <div class="m-list-item-option" data-id="1"><ul>
                        <li><a href="{{ $award->id }}" class="item-edit">edit</a></li>
                        <li><a href="/system/ajax/award/delete/{{ $award->id }}" class="item-delete direct-delete">delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <p class="empty-message">No awards found. Submit one now.</p>

    @endif

</div>

@endsection

@section('modal')

<div class="modal-wrapper" id="award-add">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'award-form')) !!}
    <h3>Add award</h3>

    <div class="m-input-group fwidth flexbox-wrap">

        <div class="m-input-wrapper fwidth">
            <input type="text" name="title" id="award-input-title" class="bind-input-from" data-target="#award-input-url" required>
            <label for="title">title</label>
        </div>

        <div class="m-input-group fwidth justify-between">

            <div class="m-input-wrapper m-input-wrapper-select w50-6">
                <select id="award-input-year" name="year" required>
                    @for($year = date('Y'); $year > 1995; $year-=1)
                    <option value="{{ $year }}"{{ $year == date('Y') ? " selected" : "" }}>{{ $year }}</option>
                    @endfor
                </select>
                <label for="year">year</label>
            </div>

            <div class="m-input-wrapper m-input-wrapper-select w50-6">
                <select id="award-input-month" name="month" required>
                    <option value="1" selected>january</option>
                    <option value="2">february</option>
                    <option value="3">march</option>
                    <option value="4">april</option>
                    <option value="5">may</option>
                    <option value="6">june</option>
                    <option value="7">july</option>
                    <option value="8">august</option>
                    <option value="9">september</option>
                    <option value="10">october</option>
                    <option value="11">november</option>
                    <option value="12">december</option>
                </select>
                <label for="month">month</label>
            </div>
        </div>

        <div class="m-input-group textarea flexbox flexbox-wrap fwidth">
            <h3 class="input-group-title">description</h3>
            <div class="input-wrapper fwidth">
                <textarea name="description" id="award-input-desc" rows="5"></textarea>
            </div>
        </div>
    </div>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <a href class="md-button md-button-plain modal-close" id="close-award-form">cancel</a>
        <a href class="md-button md-button-plain" id="save-award">save</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')

<script>
    Matter.admin.awards();
</script>

@endsection
