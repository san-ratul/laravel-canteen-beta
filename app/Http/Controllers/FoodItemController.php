<?php

namespace App\Http\Controllers;

use App\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodItems = FoodItem::all();
        return view('foodItems.index',compact('foodItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodItems.createFoodItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $path = '/uploads/food-items/'.$filename;
            $file->move(public_path().'/uploads/food-items/',$filename);
        }
        FoodItem::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $path,
        ]);
        return redirect('/food-items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodItem $foodItem)
    {
        return view('foodItems.editFoodItem',compact('foodItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $foodItem)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $path = '/uploads/food-items/'.$filename;
            $file->move(public_path().'/uploads/food-items/',$filename);
        }else{
            $path = $foodItem->image;
        }
        $foodItem->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $path,
        ]);
        return redirect('/food-items')->with('status','Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $foodItem)
    {
        $foodItem->delete();
        return redirect('/food-items')->with('status','Item Deleted Successfully');
    }
}
