<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function list()
    {
        $banners = Banner::all();

        return view('admin.banners.list', compact('banners'));
    }

    public function add()
    {
        return view('admin.banners.add');
    }

    public function saveAdd(Request $request)
    {
        $banner = new Banner();
        $banner->fill($request->all());
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/banners', $newFileName);
            $banner->photo = str_replace('public/', '', $path);
        }
        $banner->save();
        return redirect(route('admin.banner.list'))->with('msg', 'Thêm mới thành công!');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function saveEdit($id, Request $request)
    {
        $banner =  Banner::find($id);
        $banner->fill($request->all());
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/products', $newFileName);
            $banner->photo = str_replace('public/', '', $path);
        }
        $banner->save();
        return redirect(route('admin.banner.list'))->with('msg','Cập nhật thành công!');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->back();
    }
}
