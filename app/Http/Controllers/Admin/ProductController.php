<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::with('category')->get();

        return view('admin.pages.product-list',compact('products'));
    }


    public function productCreateForm()
    {
        $categories = Category::all();

        return view('admin.pages.create-product',compact('categories'));
    }

    public function productStore(Request $request){

            // dd($request->all());

                $image_name=null;
//              step 1: check image exist in this request.
                 if($request->hasFile('product_image'))
                 {
                     // step 2: generate file name
                     $image_name=date('Ymdhis') .'.'. $request->file('product_image')->getClientOriginalExtension();
// dd($image_name);
                     //step 3 : store into project directory

                     $request->file('product_image')->storeAs('/uploads/products',$image_name);

                 }

        Product::create([
            // field name from db || field name from form
            'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'details'=>$request->details,
            'image'=>$image_name,
        ]);

        return redirect()->back()->with('success','Product created successfully.');

    }

    public function productDetails($product_id)
    {

//        collection= get(), all()====== read with loop (foreach)
//       object= first(), find(), findOrFail(),======direct
      $product=Product::find($product_id);
//      $product=Product::where('id',$product_id)->first();
        return view('admin.pages.product-details',compact('product'));
    }

    public function productDelete($product_id)
    {
       Product::find($product_id)->delete();
       return redirect()->back()->with('success','Product Deleted.');
    }

    public function productEdit($id){
        // dd($id);
        $categories = Category::all();
        $product = Product::find($id);
        if ($product) {
            return view('admin.pages.update-product',compact('product','categories'));
        }

    }

    public function productUpdate(Request $request,$id){
        // dd($request->all());
        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name'=>$request->name,
            'price'=>$request->price,
            'category_id'=>$request->category,
            'details'=>$request->details,
            ]);
            return redirect()->route('admin.product.list');
        }
    }

    public function productSearch(){
        // dd(request()->all());
        $key = request()->search;
        $products = Product::where('name','LIKE',"%{$key}%")->get();
        // dd($products);
        return view('admin.pages.search-product-list',compact('products'));
    }
}
