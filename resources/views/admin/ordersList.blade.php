@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Order Records</h2>
        </div>
        <div class="card-body">
        @if(isset($orderList))
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Order Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php $total = 0; ?>
                @foreach($orderList as $order)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                        <td>{{$order->userName}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price*$order->quantity}}</td>
                        <td>
                    </tr>
                    <?php $total += ($order->price*$order->quantity); ?>
                @endforeach
                <tr>
                    <td></td>
                    <td colspan="4">Total</td>
                    <td>{{$total}}</td>
                </tr>
            </thead>
        </table>
        @else
        <div class="alert alert-danger">No Orders Placed Yet</div>
        @endif
        </div>    
    </div>
    <div class="card-footer">
    </div>
    
    
</div>
@endsection
