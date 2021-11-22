<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');

    }

    public function store(Request $request){
        // dd($request->all());

        try {
            Category::create([
                // field name from DB ||  field name from form
                'name'=>$request->name,
                'description'=>$request->description,

            ]);
            return redirect()->route('admin.category')->with('message','category created successfully');
        }catch (\Throwable $throwable)
        {
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
