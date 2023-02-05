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
        $request = $request->all();
        $page = $request['page'] ?? 18;
        $sort = $request['sort'] ?? 'title';
        $perPage = $request['perPage'] ?? 1;
        $page = $request['page'] ?? '';
        $keyword = $request['searchName'] ?? '';
        $sort_by = $request['sort_by'] ?? 'asc';
        $products = Product::where('title', 'LIKE', '%'. $keyword. '%')
        ->simplePaginate(
            $perPage = 18, $columns = ['*'], $pageName = 'Shop'
        );
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
        if($request->image) {
            foreach ($request->image as $item)
            {
                $newFileName = uniqid() . '-' . $item->getClientOriginalName();
                $path = $item->storeAs('public/uploads/products', $newFileName);
                array_push($imageArr,$path);
            };
        }
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/products', $newFileName);
        }
        $product = Product::create([
            'title' => $request->title ?? '',
            'summary' => $request->summary ?? '',
            'description' => $request->description ?? '',
            'price' => $request->price ?? '',
            'stock' => $request->stock ?? '',
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
        $month = $request->input('month');
        $year = $request->input('year');
        $time = array(
            'month' => $month,
            'year' => $year,
        );
        return Excel::download(new ProductExport($month,$year), 'Báo cáo mua hàng tháng '. $month . ' năm '. $year .'.CSV');
    }
}
