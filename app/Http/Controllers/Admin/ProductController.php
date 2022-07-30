<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function saveAdd(Request $request)
    {
        $product = new Product();
        $product->fill([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'description' => $request->description,
            'photo' => $request->photo,
            'stock' => $request->stock,
            'size' => $request->size,
            'price' => $request->price,
            'discount' => $request->discount,
            'cat_id' => $request->cat_id,
            'brand_id' => $request->brand_id,
        ]);
        $product->save();
        return redirect(route('admin.product.list'));
    }
}
