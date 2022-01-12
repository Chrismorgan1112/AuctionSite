<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index($id){
        $cart = Transaction::Where('user_id',$id)->Where('status','cart')->get();
        return view('cart',['cart'=>$cart]);
    }

    public function checkoutTransaction(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        Transaction::Where('user_id',Auth::user()->id)->where('status','cart')->update(['status'=>'purchased','transaction_time'=>$date]);
        $trans = Transaction::Where('user_id',Auth::user()->id)->where('status','purchased')->get();
        return view('transaction',['trans'=>$trans]);
    }
}
