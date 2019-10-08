@extends('layouts.app')

@section('content')

<div class="container">
    @if(Auth::user()->admin == 1)
        @include('admin.adminSection')
    @else
        @include('Student.studentSection') 
    @endif
        
</div>
@endsection
