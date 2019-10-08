@extends('layouts.app')

@section('content')

<div class="container">
<h2>Available Food Items</h2>
    <div class="row">
        @if(isset($foodItems))
        @foreach($foodItems as $foodItem)
        <div class="container col-md-3 mt-2">
        <div class="card">
            <img class="card-img-top" width="200" height="160" src="{{$foodItem->image}}" alt="{{$foodItem->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$foodItem->name}}</h5>
                <p class="card-text">Available: {{$foodItem->quantity}} Unit</p>
                <p class="card-text">Price/Unit: {{$foodItem->price}} Taka</p>
            </div>
            <div class="card-footer">
                <form action="{{url('/add-to-cart')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="food_id" value="{{$foodItem->id}}">
                    <input class="form-control"type="number" name="quantity" placeholder="Enter Number of Items">
                    <input type="submit" value="Add to Cart" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
        </div>
        
        @endforeach
        @else
            <div class="alert alert-danger">No Food Items Avaailable Now Please Check Later</div>
        @endif
    </div>
</div>
@endsection
