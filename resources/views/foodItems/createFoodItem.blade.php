@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Add Food Item</h2>
        </div>
        <div class="card-body">
            <form action="{{url('/food-items')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="program">Food Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Food Name">
                    @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="program">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Food price">
                    @if ($errors->has('price'))
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="program">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Food quantity">
                    @if ($errors->has('quantity'))
                        <div class="text-danger">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input">
                        <label for="image" class="custom-file-label">Choose Image</label>
                        @if ($errors->has('image'))
                        <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="float-right btn btn-success" style="margin-top: 20px">Add Food Item</button>
                <div style="clear:both"></div>
            </form>
        </div>
    </div>
</div>
@endsection
