<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Http\Requests\ExportRequest;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function list(Request $request)
    {
        $productSearch = Product::query();
        if(!$request->searchName){
            $products = $productSearch->get();
        }else{
            if ($request->has('searchName')) {
                $productSearch->where('title', 'LIKE', '%' . $request->searchName . '%');
            }

            $products = $productSearch->get();
        }
        $products->load('category', 'brand');
        return view('admin.product.list', compact('products'));
    }

    public function add()
    {
        // $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    public function saveAdd(ProductRequest $request)
    {
        $imageArr = [];
        foreach ($request->image as $item)
        {
            $newFileName = uniqid() . '-' . $item->getClientOriginalName();
            $path = $item->storeAs('public/uploads/products', $newFileName);
            array_push($imageArr,$path);
        };
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/products', $newFileName);
        }
        $product = Product::create([
            'title' => $request->title ?? '',
            'summary' => $request->summary ?? '',
            'description' => $request->description ?? '',
            'price' => $request->price ?? '',
            'discount' => $request->discount ?? '',
            'photo' => str_replace('public/', '', $path) ?? '',
            'size' => json_encode($request->size) ?? '',
            'color' => json_encode($request->color) ?? '',
            'images' => json_encode(str_replace('public/', '', $imageArr)) ?? '',
            'status' => $request->status ?? 'active'
        ]);
        return redirect(route('admin.product.list'))->with('msg','Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }

    public function saveEdit($id, SaveProductRequest $request)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/products', $newFileName);
            $product->photo = str_replace('public/', '', $path);
        }
        $product->save();
        toastr()->info('Sửa sản phẩm thành công!!');
        return redirect(route('admin.product.list'))->with('msg','Cập nhật thành công!');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect(route('admin.product.list'));
        }
        $product->delete();
        return redirect()->back();
    }
    public function export(Request $request) 
    {
        $time = $request->input('number');
        return Excel::download(new ProductExport($time), 'Báo cáo mua hàng tháng '. $time .'.CSV');
    }
}
