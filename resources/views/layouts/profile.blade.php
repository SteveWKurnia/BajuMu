@extends('layouts.master')

@section('title','profile')

@section('content')
    <div class="container">
        <div class="d-flex flex-column">
            {{--User info--}}
            <div class="d-flex flex-row">
                <img src="/storage/images/witch.webp" width="100" height="100px">
                <div class="flex-column">
                    <h6>{{$user->name}}</h6>
                    <h6>{{$user->email}}</h6>
                </div>
            </div>
            {{--Table transaction--}}
            <div>
                <table class="table-bordered table-hover">
                    <tr>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Provider</th>
                        <th>Status</th>
                    </tr>
                    @foreach($items as $item)
                        <tr>
                            <td><img src="{{asset('/storage/images/'.$item->image)}}" width="100" height="100"></td>
                            <td>{{$item->name}}</td>
                            @foreach($transactions as $tr)
                                @if($tr->item_id === $item->id)
                                    @if($tr->provider_id === \Illuminate\Support\Facades\Auth::user()->id)
                                        <td>You</td>
                                    @else
                                        @foreach($providers as $provider)
                                            @if($provider->provider_id === $tr->provider_id)
                                                <td>{{$provider->name}}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($tr->is_completed === 0)
                                        <td>Process</td>
                                    @else
                                        <td>Completed</td>
                                    @endif
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            {{--Add new item--}}
            <div>
                <form action="/item/create" method="GET">
                    {{csrf_field()}}
                    <button type="submit">Add new item</button>
                </form>
            </div>
        </div>
    </div>
@endsection
