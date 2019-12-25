@extends('layouts.master')

@section('title','Add new')

@section('content')
    <div class="container justify-content-center">
        <h2>Add new item</h2>
        <form action="/item/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="item_name">Item name:</label>
                <input type="text" name="item_name" id="item_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="item_price">Item price:</label>
                <input type="text" name="item_price" id="item_price" class="form-control">
            </div>

            <div class="form-group">
                <label for="item_desc">Item desc:</label>
                <input type="text" name="item_desc" id="item_desc" class="form-control">
            </div>

            <div class="form-group">
                <input type="file" name="item_image" id="item_image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-dark form-control" value="Insert">Save</button>
        </form>
    </div>
@endsection
