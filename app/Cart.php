<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable =[
        'user_id','food_id','quantity'
    ];

    public static function cartList($user_id){
        return DB::table('food_items')
            ->select('food_items.id as food_id','food_items.name','food_items.price','carts.quantity','carts.id')
            ->join('carts', 'food_items.id','=','carts.food_id')
            ->where('carts.user_id','=',$user_id)
            ->get();
    }


}
