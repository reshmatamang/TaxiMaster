<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NewOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOnGoingOrdersPage(Request $request){

        if(Auth::check()){
            if(!isset($request['state'])){
                $orderList = NewOrder::with('user')->get();
            }
            else{
                $state = $request->state;
                $orderList = NewOrder::where('state', $state)->with('user')->get();
            }
            return view('ongoing', compact('orderList'));
        }
        else{
            return view('login');
        }

    }
}