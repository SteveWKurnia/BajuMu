@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <table class="table-bordered">
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Image</th>
            <th>Item Price</th>
            <th>Item provider</th>
            <th>Add to cart</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td><img src="{{'/storage/images/'.$item->image}}" width="300" height="400" alt=""></td>
                <td>{{$item->price}}</td>
                @foreach($users as $user)
                    @if($item->provider_id === $user->id)
                        <td>{{$user->name}}</td>
                    @endif
                @endforeach
                <td>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if($item->provider_id === \Illuminate\Support\Facades\Auth::user()->id)
                            <form action="/item/edit/{{$item->id}}" method="GET">
                                {{csrf_field()}}
                                <button type="submit">Edit</button>
                            </form>
                        @else
                            <form action="/item/{{$item->id}}" method="GET">
                                {{csrf_field()}}
                                <button type="submit">Add to cart</button>
                            </form>
                        @endif
                    @else
                        <form action="/item/{{$item->id}}" method="GET">
                            {{csrf_field()}}
                            <button type="submit">Add to cart</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{$items->links()}}

@endsection
