@extends('layouts.master')

@section('title','cart')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <table class="table-bordered">
            <tr>
                <th>Item image</th>
                <th>Item name</th>
                <th>Checkout</th>
            </tr>
            @foreach($items as $item)
                <tr>
                    <td><img src="{{'/storage/images/'.$item->image}}" width="300" height="450"></td>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="/cart/{{$item->id}}" method="post">
                            {{csrf_field()}}
                            <button type="submit">Checkout</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        You must first log in!
    @endif
@endsection
