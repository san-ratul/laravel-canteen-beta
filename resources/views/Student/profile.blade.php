@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="float-left">User Details</h2>
        </div>
        <div class="card-body">
            @include('layouts.status')
            <p><b>Name: </b> {{$user->name}} </p>
            <p><b>Email: </b> {{$user->email}} </p>
            <p><b>Contact Number: </b> {{$user->studentDetails->contact_number}} </p>
            <p><b>Available Balance: </b> {{$user->studentDetails->advance_payment}} Taka</p>
        </div>
        <div class="card-footer">
             
        </div>
    </div>
</div>
@endsection
