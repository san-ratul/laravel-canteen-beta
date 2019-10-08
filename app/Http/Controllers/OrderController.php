<?php

namespace App\Http\Controllers;

use App\Order;
use App\FoodItem;
use App\Cart;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodItems = FoodItem::all();
        return view('Orders.index',compact('foodItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function cart(Request $request)
    {
        $this->validate($request,[
            'quantity' => 'required|numeric'
        ]);

        $cart = Cart::create($request->all());
        return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function showCart(User $user)
    {
        $cartList = Cart::cartList($user->id);
        return view('Orders.cart',compact('cartList','user'));
    }

    public function showOrder(User $user)
    {
        $orderList = Order::orderList($user->id);
        return view('Orders.ordersList',compact('orderList'));
    }
    public function deleteCart(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }

    public function allOrders()
    {
        $orderList = Order::getFullOrdersList();
        return view('admin.ordersList',compact('orderList'));
    }

    public function placeOrder(User $user)
    {
        $cartList = Cart::cartList($user->id);
        $total = 0;
        foreach($cartList as $cartItem){
            $subtotal = $cartItem->quantity*$cartItem->price;
            Order::create([
                'user_id' => $user->id,
                'food_id' => $cartItem->food_id,
                'quantity' => $cartItem->quantity,
            ]);
            $foodItem = FoodItem::find($cartItem->food_id);
            $foodItem->update([
                'quantity' => ($foodItem->quantity -  $cartItem->quantity),
            ]);
            $total += $subtotal;
            Cart::find($cartItem->id)->delete();
        }
        $student = Student::find($user->studentDetails->id);
        $student->update([
            'advance_payment' => ($student->advance_payment-$total),
        ]);
        return redirect('/home')->with('status','Order Placed!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
