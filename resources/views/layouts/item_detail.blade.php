@extends('layouts.master')

@section('title','login')

@section('content')
    <div class="d-flex flex-row">
        <img src="{{asset('/storage/images/'.$item->image)}}" width="300" height="400">
        <div class="flex-column">
            <div>
                {{$item->name}}
            </div>
            <div>
                {{$item->price}}
            </div>
            <div>
                {{$item->description}}
            </div>
            <div>
                <form action="/item/{{$item->id}}" method="POST" class="flex-column d-flex">
                    {{csrf_field()}}
                    <label for="date_start">From:</label>
                    <input type="date" name="date_start" id="date_start">
                    <label for="date_end">Until:</label>
                    <input type="date" name="date_end" id="date_end">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
