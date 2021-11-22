<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productList()
    {
        $products = Product::with('category')->orderBy('id','desc')->paginate(10);
        return view('admin.layouts.product-list',compact('products'));
    }

    public function productCreate()
    {
        $categories = Category::select('id','name')->orderBy('id','desc')->get();
        return view('admin.layouts.product-create',compact('categories'));

    }

    public function store(Request $request){
        // dd($request->all());

        try {
            Product::create([
                // field name from DB ||  field name from form
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'description'=>$request->description,

            ]);
            return redirect()->route('admin.products')->with('success','product created successfully');
        }catch (\Throwable $throwable)
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }



}
