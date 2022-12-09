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

    public function list()
    {
        $products = Product::all();
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
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image[0]->getClientOriginalName();
            $pathImage = $request->image[0]->storeAs('public/uploads/products', $newFileName);
        }
        $arr_tojson = array(
            'size' => $request->size[0] ?? '',
            'color' => $request->color[0] ?? '', 
            'image' => $pathImage ?? '',
        );
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
            'style' => [json_encode($arr_tojson)] ?? '',
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
