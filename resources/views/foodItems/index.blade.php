@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="float-left">Food Items</h2>
            <a href="{{url('/food-items/create')}}" class="btn btn-primary float-right">Add Food Item</a>
        </div>
        <div class="card-body">
            @include('layouts.status')
            @if(isset($foodItems))
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Food Item</th>
                        <th>Price</th>
                        <th>Available Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($foodItems as $foodItem)
                    <tr>
                        <td>
                        <h2> {{$foodItem->name}} </h2>
                        <img src="{{asset($foodItem->image)}}" alt="{{$foodItem->name}}" width="150" height="100">
                        </td>
                        <td>{{$foodItem->price}} Taka</td>
                        <td>{{$foodItem->quantity}} </td>
                        <td>
                        <a href="{{url('food-items/'.$foodItem->id.'/edit')}}" class="btn btn-primary float-left">Edit</a>
                        <form action="{{url('food-items/'.$foodItem->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-danger">No Food Items Added! <a href="{{url('/food-items/create')}}">Add Food Item</a></div>
            @endif
        </div>
    </div>
</div>
@endsection
