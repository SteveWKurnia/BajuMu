@extends('layouts.master')

@section('title','login')

@section('content')
    <div id="content">
        <h1>Login</h1>
        <form action="/login" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="text" name="email" id="email" placeholder="email"  autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="remember">Remember</label>
                <input type="checkbox" id="remember" name="remember">
            </div>
            <button type="submit" class="btn-dark btn">Login</button>
        </form>
        <a href="/register" class="btn btn-dark">Register</a>
    </div>
@endsection
