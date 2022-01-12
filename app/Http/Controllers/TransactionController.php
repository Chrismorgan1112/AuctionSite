<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index(){
        $trans = Transaction::Where('user_id',Auth::user()->id)->where('status','purchased')->get();
        return view('transaction',['trans'=>$trans]);
    }

    public function trans_detail($transaction_id){
        $trans = Transaction::Where('user_id',Auth::user()->id)->where('status','purchased')->Where('transaction_id',$transaction_id)->first();
        return view('transactionDetail',['trans'=>$trans]);
    }
}
