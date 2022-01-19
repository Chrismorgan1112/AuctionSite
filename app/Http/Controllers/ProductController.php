<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInsert()
    {
        $categories = Category::all();
        return view("admin.insert-product", ["categories" => $categories]);
    }

    public function indexUpdate($product_id)
    {
        $categories = Category::all();
        $product = Product::find($product_id);
        return view("admin.update-product", ["categories" => $categories, "product" => $product]);
    }

    /**
     * Store a newly created resource in storage (INSERT PRODUCT)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i');
        $date = date('Y-m-d H:i',strtotime($date . "+1 days"));
        $validatedInput =  $this->validate($request, [
            'category' => ['required', 'gt:0'],
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:10'],
            'price' => ['required', 'numeric', 'min:1000'],
            'end_date'=>['required', 'AfterOrEqual:'.$date],
            'image' => ['required']
        ]);

        # Storing Image
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/'.$imageName;

        $product = new Product;
        $product->category_id = $validatedInput['category'];
        $product->product_title = $validatedInput['title'];
        $product->product_desc = $validatedInput['description'];
        $product->product_price = $validatedInput['price'];
        $product->status = 'open';
        $product->end_date = $validatedInput['end_date'];
        $product->image_path = $imagePath;

        $product->save();

        return redirect("/home");
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
        $detail = Product::Where('product_id',$id)->first();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        if($detail->end_date <= $date){
            Product::Where('product_id',$detail->product_id)->update(['status'=>'close']);
            $trans = Transaction::Where('product_id', $detail->product_id)->where('status','bidding')->orderBy('price', 'DESC')->orderBy('updated_at')->first();
                if($trans != null){
                    Transaction::Where('transaction_id', $trans->transaction_id)->update(['status'=>'cart']);
                    Transaction::Where('product_id', $detail->product_id)->where('status','bidding')->delete();
                }
        }
        $detail = Product::Where('product_id',$id)->first();
        return view('productDetail',["detailProduct"=>$detail]);
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
        $validatedInput =  $this->validate($request, [
            'category' => ['required'],
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:10'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'status'=> ['required']
        ]);

        $product = Product::find($id);

        if($validatedInput['status'] == 'open'){
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i');
            $date = date('Y-m-d H:i',strtotime($date . "+1 days"));
            $validatedInput =  $this->validate($request, [
                'category' => ['required'],
                'title' => ['required', 'min:5'],
                'description' => ['required', 'min:10'],
                'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
                'status'=> ['required'],
                'end_date'=>['required','AfterOrEqual:'.$date]
            ]);
            $product->end_date = $validatedInput['end_date'];
        }

         # Storing Image
         if($request->image != null){
            $file = $request->file('image');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;

            $product->image_path = $imagePath;
        }

        # Save all required field
        $product->category_id = $validatedInput['category'];
        $product->product_title = $validatedInput['title'];
        $product->product_desc = $validatedInput['description'];
        $product->product_price = $validatedInput['price'];
        $product->status = $validatedInput['status'];

        $product->save();

        $request->session()->flash('Update', 'Update Successful!');
        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        Transaction::Where('product_id', $id)->Where('status','bidding')->orWhere('status','cart')->delete();
        Transaction::Where('product_id', $id)->Where('status','purchased')->delete();
        Product::Where('product_id', $id)->delete();
        return redirect()->back();
    }
}
