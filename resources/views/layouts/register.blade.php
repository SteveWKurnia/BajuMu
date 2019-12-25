@extends('layouts.master')

@section('title','Register')

@section('content')
    <div class="container">
        <h1>Register new user</h1>
        <form action="/register/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="user_name">Name:</label>
                <input type="text" name="user_name" id="user_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="text" name="user_email" id="user_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_password">Password:</label>
                <input type="password" name="user_password" id="user_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark form-control">Register</button>
        </form>
    </div>
@endsection
