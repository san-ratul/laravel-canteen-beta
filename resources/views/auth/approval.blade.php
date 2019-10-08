@extends('layouts.app')

@if(auth()->user()->approved_at)
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Waiting for Approval</div>

                        <div class="card-body">
                            Your account is Approved
                            <br />
                            Please<a href="{{url('/home')}}"> click here</a> to get back to home.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Waiting for Approval</div>

                        <div class="card-body">
                            Your account is waiting for our administrator approval.
                            <br />
                            Please check back later.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif