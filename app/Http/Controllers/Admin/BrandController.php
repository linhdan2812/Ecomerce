<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('admin.brand.list', compact('brands'));
    }

    public function add()
    {
        return view('admin.brand.add');
    }

    public function saveAdd(Request $request)
    {
        $brand = new Brand();
        $brand->fill([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'status' => $request->status
        ]);
        $brand->save();
        return redirect(route('admin.brand.list'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function saveEdit($id, Request $request)
    {
        $brand = Brand::find($id);
        $brand->fill($request->all());
        $brand->save();
        return redirect(route('admin.brand.list',compact('brand')));
    }

    public function delete($id){
        $brand = Brand::find($id);
        if(!$brand){
            return redirect(route('admin.brand.list'));
        }
        $brand->delete();
        return redirect(route('admin.brand.list'));
    }
}
