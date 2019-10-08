@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Food Items</h2>
        </div>
        <div class="card-body">
        @if(count($user->cart)>0)
        <table class="table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Order Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                <?php $total = 0; ?>
                @foreach($cartList as $cart)
                    <tr>
                        <td>{{$cart->name}}</td>
                        <td>{{$cart->price}}</td>
                        <td>{{$cart->quantity}}</td>
                        <td>{{$cart->price*$cart->quantity}}</td>
                        <td>
                        <form action="{{url('/delete-cart-item/'.$cart->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                        </td>
                    </tr>
                    <?php $total += ($cart->price*$cart->quantity); ?>
                @endforeach
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{$total}}</td>
                    <td>Remaining Balance/Due: {{$user->studentDetails->advance_payment-$total}}</td>
                </tr>
            </thead>
        </table>
        @else
        <div class="alert alert-danger">No items in cart</div>
        @endif
        </div>    
    </div>
    <div class="card-footer">
        <a href="{{url('/place-order/'.$user->id)}}" class="btn btn-success">Place Order</a>
    </div>
    
    
</div>
@endsection
