@extends('admin.master')
@section('page', 'accounts')

@section('fab')

<m-fab salmon class="modal-open" data-target="#admin-account-form"><i class="material-icons">add</i></m-fab>

@stop

@section('content')

<m-template list>

    <table>
        <thead>
            <tr>
                <td width="5%">
                    <m-list-item-check class="all"></m-list-item-check>
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
                    <m-list-item-check class="single" data-id=""></m-list-item-check>
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

<m-modal-wrapper id="admin-account-form">

    {!! Form::open(array('class' => 'modal-window', 'id' => 'admin-account-form', 'data-function' => 'modalClose', 'data-url' => 'admin/store', 'style' => 'max-width: 640px')) !!}
    <h3>social network accounts</h3>

    <m-input-group>
        <m-input>
            <input type="text" id="social-input-facebook" required>
            <label for="social-input-facebook">facebook</label>
        </m-input>

        <m-input>
            <input type="text" id="social-input-twitter" required>
            <label for="social-input-twitter">twitter</label>
        </m-input>
    </m-input-group>

    <input type="hidden" name="edit" value="0" id="edit-flag">

    <div class="button-holder align-right">
        <m-button plain class="modal-close">cancel</m-button>
        <m-button save-form plain>save</m-button>
    </div>
    {!! Form::close() !!}
</m-modal-wrapper>
@stop

@section('scripts')

<script type="text/javascript">
    Matter.admin.account();
</script>

@stop
