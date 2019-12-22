<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function addToCart(Request $request, $id){
        $cart = new Cart();
        $cart->item_id = $id;
        $cart->user_id = Auth::user()->id;

        $date_start = Carbon::parse($request->input('date_start'));
        $date_end = Carbon::parse($request->input('date_end'));

        $borrow_period = $date_start->diffInDays($date_end,false);
        $cart->number_of_days = $borrow_period;

        $cart->save();

        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(2);
        $provider = DB::table('items')
            ->pluck('items.provider_id')
            ->toArray();
        $users = DB::table('users')
            ->select('users.*')
            ->whereIn('users.id',$provider)
            ->get();

        return view('layouts.home', compact('items','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
//        dd($item);
        return view('layouts.item_detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
