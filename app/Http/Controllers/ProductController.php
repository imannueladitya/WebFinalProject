<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function form (){
        return view('AddProductForm');
    }

    public function product() {
        $products = DB::table('product')
            ->leftJoin('details', 'product.id', '=', 'details.product_id')
            ->select('product.product_name', 'product.product_price', 'details.product_id', 
                    DB::raw('COALESCE(SUM(details.qty), 0) as total_pesanan'))
            ->groupBy('product.id')
            ->get();
    
        return view('stocklist', compact('products'));
    }
    
    


    // public function product() {
    //     $products = DB::table('product')
    //         ->join('details', 'product.id', '=', 'details.product_id')
    //         ->select('product.product_name', 'product.product_price', 'details.product_id', 
    //                 DB::raw('SUM(details.qty) as total_pesanan'))
    //         ->groupBy('details.product_id')
    //         ->get();
    
    //     return view('stocklist', compact('products'));
    // }

    // public function product (){
    //     $products =  Product::all(); // select* from product
    //     return view('stocklist',compact ('products'));
    // }    

    public function addProduct (){
        $product = new Product();

        $product->product_name = \request('name');
        $product->product_price = \request('price');

        $product->save();
        return redirect()->route('productform')->with('success', 'Product Added Successfully');
    }
}
