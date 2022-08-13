<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        $products->load('category','brand');
        return view('admin.product.list', compact('products'));
    }

    public function add()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.add',compact('brands','categories'));
    }

    public function saveAdd(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('photo')){
                       $newFileName = uniqid(). '-' . $request->photo->getClientOriginalName();
                       $path = $request->photo->storeAs('public/uploads/products', $newFileName);
                       $product->photo = str_replace('public/', '', $path);
                   }
        $product->save();
        return redirect(route('admin.product.list'));
    }

    public function edit($id){
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit',compact('product','brands','categories'));
    }

    public function saveEdit($id , Request $request){
        $product = Product::find($id);
        $product->fill($request->all());
        if($request->hasFile('photo')){
            $newFileName = uniqid(). '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/products', $newFileName);
            $product->photo = str_replace('public/', '', $path);
        }
        $product->save();
        return redirect(route('admin.product.list'));
    }

    public function delete($id){
        $product = Product::find($id);
        if(!$product){
            return redirect(route('admin.product.list'));
        }
        $product->delete();
        return redirect()->back();
    }
}
