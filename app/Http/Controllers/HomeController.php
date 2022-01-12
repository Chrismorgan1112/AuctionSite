<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $products = Product::all();
        foreach($products as $prod){
            if($prod->end_date <= $date || $prod->status == 'close'){
                Product::Where('product_id', $prod->product_id)->update(['status'=>'close']);
                $trans = Transaction::Where('product_id', $prod->product_id)->where('status','bidding')->orderBy('price', 'DESC')->orderBy('updated_at')->first();
                if($trans != null){
                    Transaction::Where('transaction_id', $trans->transaction_id)->update(['status'=>'cart']);
                    Transaction::Where('product_id', $prod->product_id)->where('status','bidding')->delete();
                }
            }
        }
        $products = Product::all();
        return view('home',["product"=>$products]);
    }
}
