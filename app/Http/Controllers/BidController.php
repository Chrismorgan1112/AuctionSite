<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    //
    public function bid_item(Request $request, $product_id){
        $openPrice = Product::Where('product_id', $product_id)->first();
        $validateData = $request->validate([
            'price'=>['required', 'numeric', 'min:'.$openPrice['product_price']]
        ]);

        $alreadyInTransaction = Transaction::Where('user_id',Auth::user()->id)->where('product_id', $product_id)->where('status','bidding')->first();
        if($alreadyInTransaction == null){
            $transaction = new Transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->status = 'bidding';
            $transaction->product_id = $product_id;
            $transaction->price = $validateData['price'];
            $transaction->save();
        }else if($alreadyInTransaction != null){
            Transaction::Where('user_id',Auth::user()->id)->where('product_id', $product_id)->where('status','bidding')->update(['price'=>$validateData['price']]);
        }
        return redirect()->back();
    }

    public function bid_item_list(){
        $bidItem = Transaction::Where('user_id', Auth::user()->id)->where('status','bidding')->get();
        return view('bidPage',['bidList'=>$bidItem]);
    }

    public function delete_bid_item($id){
        Transaction::Where('transaction_id', $id)->delete();
        return redirect()->back();
    }
}
