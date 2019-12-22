@extends('layouts.master')

@section('title','login')

@section('content')
    <div id="content">
        <h1>Login</h1>
        <form action="/login" method="post">
            {{csrf_field()}}
            <div>
                <label for="email" >Email</label>
                <input type="text" name="email" id="email" placeholder="email"  autofocus>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <div>
                <label for="remember">Remember</label>
                <input type="checkbox" id="remember" name="remember">
            </div>
            <div>
                <input type="submit" value="Login">
            </div>

        </form>
    </div>
@endsection
