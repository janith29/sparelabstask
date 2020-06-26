<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\User;
use App\Product;


use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator', ['except' => 'logout']);
    }

    public function index()
    {
        $products = Product::orderBy('id')->get();
        return view('admin.product.welcome',compact('products'));
    }
    public function store(Request $request,Product $product)
    {

        $lastid=0;
        $productes=DB::select('select * from product ORDER BY id DESC LIMIT 1');
        
        foreach($productes as $producte)
        {
            $lastid=$producte->id;
        }
        $lastid=$lastid+1;
        $file=$request ->file('product-image');
        $type=$file->guessExtension();
        $name=$lastid."productpic.".$type;
        $file->move('image/product',$name);

        $product->name = $request->get('product-name');
        $product->price = $request->get('product-price');
        $product->discription = $request['product-discription'];
        $product->image = $name;
        $product->created_at =Carbon::now();
        $product->save();

        auth()->user()->notify(new RepliedToTread());
        return redirect('/admin/product')->with('message', 'New product add successfully!');
    }
    public function markread()
    {
        auth()->user()->unreadnotifications->markAsRead();
        return back();
    }
    public function show( Product $product)
    {
        return view('admin.product.show',['product' => $product]);
    }
    public function update( Request $request,Product $product)
    {
        $product=Product::findOrFail( $request->productid);
        $product->name = $request->get('productname');
        $product->discription = $request->get('productdiscription');
        $product->price = $request->get('productprice');
        $product->save();
        return back()->with('message', 'Product edit successfully!');
    }
    public function delete( Request $request,Product $product)
    {
        $product=Product::findOrFail( $request->productid);
        $product->delete();
        return redirect('/admin/product')->with('deletemessage','Product delete successfully!');
    }

}
