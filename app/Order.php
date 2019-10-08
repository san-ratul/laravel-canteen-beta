<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Order extends Model
{
    protected $fillable =[
        'user_id','food_id','quantity'
    ];

    public static function orderList($user_id){
        return DB::table('food_items')
            ->select('food_items.id as food_id','food_items.name','food_items.price','orders.quantity','orders.id','orders.created_at')
            ->join('orders', 'food_items.id','=','orders.food_id')
            ->where('orders.user_id','=',$user_id)
            ->get();
    }

    public static function getFullOrdersList(){
        return DB::table('food_items')
        ->select('food_items.id as food_id','food_items.name','food_items.price','orders.quantity','orders.id','orders.created_at','users.name as userName')
        ->join('orders', 'food_items.id','=','orders.food_id')
        ->join('users','users.id','=','orders.user_id')
        ->orderBy('orders.created_at','desc')
        ->get();
    }
}
