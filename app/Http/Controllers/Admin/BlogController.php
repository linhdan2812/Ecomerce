<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function add()
    {
        return view('admin.blogs.add');
    }

    public function saveAdd(Request $request)
    {
        $blog = new Blog();
        $blog->fill([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ]);
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/blogs', $newFileName);
            $blog->photo = str_replace('public/', '', $path);
        }
        $blog->save();
        return redirect(route('admin.blog.list'))->with('msg', 'Thêm mới thành công!');
    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.blogs.edit',compact('blog'));
    }

    public function saveEdit(Request $request, $id){
        $blog = Blog::find($id);
        $blog->fill([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ]);
        if ($request->hasFile('photo')) {
            $newFileName = uniqid() . '-' . $request->photo->getClientOriginalName();
            $path = $request->photo->storeAs('public/uploads/blogs', $newFileName);
            $blog->photo = str_replace('public/', '', $path);
        }
        $blog->save();
        return redirect(route('admin.blog.list'))->with('msg', 'Thêm mới thành công!');
    }

    public function delete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect(route('admin.blog.list'))->with('msg', 'Xóa mới thành công!');
    }
}
