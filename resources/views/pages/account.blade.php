@extends('index')
<?php $title = trans('word.account') ?>
@section('title', "$title")
@section('content')

<link rel="stylesheet" href="{{ asset('assets/phpcss/account.css') }}">

<section class="account">

    <h1 class="title_page">{{ strtoupper(trans('word.my_account')) }}</h1>


    @if(count($enquiries) != 0)
    <div class="enquiries">
        <table>
            <thead>
                <tr>
                    <td width="16.66%">Ref. #</td>
                    <td width="16.66%">Sent on</td>
                    <td width="16.66%">Destination</td>
                    <td width="16.66%">Contact Email</td>
                    <td width="16.66%">Status</td>
                    <td width="16.66%"></td>
                </tr>
            </thead>

            <tbody>
                @foreach($enquiries as $enquiry)
                <tr>
                    <td>{{ $enquiry->id }}</td>
                    <td>{{ $enquiry->created_at }}</td>
                    <td>{{ $enquiry->destination }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->status }}</td>
                    <td><a href="{{ '/enquiries/view/' . $enquiry->id }}" target="_blank">VIEW</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else

    <p>You have not submitted any enquiries yet.</p>

    @endif
</section>

@stop
