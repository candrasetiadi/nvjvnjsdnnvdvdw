@extends('admin.master')
@section('page', 'accounts')

@section('content')

<m-template class="flexbox flexbox-wrap">

    <h3 class="input-group-title">MY ACCOUNT</h3>

    {!! Form::open(array('class' => '', 'id' => 'account-form', 'data-function' => 'doneFunc', 'data-url' => 'account/profile/store')) !!}
    <div>
        <!-- IMAGE -->
        <div>

            @if($user->image)
            <img width="150" src="{{ asset('uploads/user/' . $user->image) }}">
            @else
            <img src="http://placehold.it/150x200">
            @endif

            <input type="file" name="file" id="account-input-file">
        </div>

        <!-- FORM -->
        <div>
            <div class="m-input-group fwidth flexbox flexbox-wrap">

                <!-- ACCOUNT -->
                <m-input>
                    <input value="{{ $user->username }}" type="text" name="username" id="account-input-username" required>
                    <label for="account-input-username">username</label>
                </m-input>

                <m-input>
                    <input type="text" name="password" id="account-input-password" required>
                    <label for="account-input-password">password</label>
                </m-input>

                <!-- PROFILE -->
                <m-input>
                    <input value="{{ $user->firstname }}" type="text" name="firstname" id="account-input-firstname" required>
                    <label for="account-input-firstname">firstname</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->lastname }}" type="text" name="lastname" id="account-input-lastname" required>
                    <label for="account-input-lastname">lastname</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->email }}" type="text" name="email" id="account-input-email" required>
                    <label for="account-input-email">email</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->address }}" type="text" name="address" id="account-input-address" required>
                    <label for="account-input-address">address</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->phone }}" type="text" name="phone" id="account-input-phone" required>
                    <label for="account-input-phone">phone</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->city }}" type="text" name="city" id="account-input-city" required>
                    <label for="account-input-city">city</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->province }}" type="text" name="province" id="account-input-province" required>
                    <label for="account-input-province">province</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->country }}" type="text" name="country" id="account-input-country" required>
                    <label for="account-input-country">country</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->zipcode }}" type="text" name="zipcode" id="account-input-zipcode" required>
                    <label for="account-input-zipcode">zipcode</label>
                </m-input>

                <m-input>
                    <input value="{{ $user->zipcode }}" type="text" name="zipcode" id="account-input-zipcode" required>
                    <label for="account-input-zipcode">zipcode</label>
                </m-input>


                <m-input fwidth select w25>
                    <input type="text" select id="account-input-branch_id" name="branch_id" value="{{ $user->branch_id }}" required>
                    <label for="account-input-branch_id">Branch</label>
                    <m-select>
                        @foreach(\App\Branch::all() as $branch)
                        <m-option value="{{ $branch->id }}">{{ $branch->name }}</m-option>
                        @endforeach
                    </m-select>
                </m-input>

            </div>
        </div>

    </div>

    <input type="hidden" name="edit" value="{{ $user->id }}" id="edit-flag">

    <m-buttons flexbox justify-end>
        <m-button save-form plain>save</m-button>
    </m-buttons>

    {!! Form::close() !!}


</m-template>

@stop

@section('scripts')
<script type="text/javascript">
    Matter.admin.accounts();
</script>
@stop
