<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $item_in_cart = DB::table('carts')
                ->where('carts.user_id','=',$user_id)
                ->pluck('carts.item_id')
                ->toArray();
            $items = DB::table('items')->select('items.*')->whereIn('items.id',$item_in_cart)->get();
            return view('layouts.cart',compact('items'));
        }else{
            return view('layouts.cart');
        }
    }

    public function checkout($id){
        $transaction = new Transaction();

        $transaction->user_id = Auth::user()->id;
        $transaction->item_id = $id;
        $transaction->is_completed = 0;
        $transaction->is_providing = 0;
        $transaction->save();

        $carts = Cart::all();
        foreach ($carts as $cart){
            if (Auth::user()->id == $cart->user_id && $cart->item_id == $id)
                DB::table('carts')
                    ->where('carts.item_id','=',$id)
                    ->where('carts.user_id','=',Auth::user()->id)
                    ->delete();
//                $this->destroy($id);
        }

        return $this->index();
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
        //
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
//        $item = Cart::findOrFail($id);
        DB::table('carts')
            ->where('carts.item_id','=',$id)
            ->delete();
//        $item->delete();
        return back();
    }
}
