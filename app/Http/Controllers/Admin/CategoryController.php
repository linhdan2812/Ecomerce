<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::all();

        return view('admin.category.list', compact('categories'));
    }

    public function addForm()
    {
        return view('admin.category.add');
    }

    public function saveAdd(Request $request)
    {
        $this->messages($request);
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect(route('admin.category.list'))->with('msg', 'Thêm mới thành công!');
    }

    public function editForm($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function saveEdit($id, Request $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect(route('admin.category.list'));
        }
        if ($request->title != $category->title){
            $this->messages($request);
        }
        $category->fill($request->all());
        $category->save();

        return redirect(route('admin.category.list'))->with('msg', 'Sửa thành công!');
    }

    public function delete($id)
    {
        $model = Category::find($id);
        if (!$model) {
            return redirect(route('admin.category.list'));
        }
        $products = Product::where("category_id", $id)->get();
        foreach ($products as $key => $item) {
            $item->delete();
        }
        Category::destroy($id);

        return redirect()->back()->with('msg', 'Xóa thành công!');
    }

    public function messages($request)
    {
        return $request->validate([
                                      'title'   => 'required|unique:categories|max:255',
                                      'summary' => 'required',
                                  ],
                                  [
                                      'title.required'   => 'Hãy nhập tên loại hàng',
                                      'title.unique'     => 'Tên loại hàng đã tồn tại',
                                      'title.max:255'    => 'Tên loại hàng quá ký tự cho phép',
                                      'summary.required' => 'Hãy nhập mô tả',
                                  ]
        );
    }
}
