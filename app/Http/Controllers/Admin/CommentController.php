<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::select([
            'comments.id',
            'users.name',
            'products.title',
            'comments.status',
            'comments.content'
        ])->join('users','users.id','comments.user_id')->join('products','products.id','comments.product_id')->get();
        return view('admin.comments.index', compact('comments'));
    }
    public function edit($id)
    {
        Comment::where('id', $id)->update(['status' => 1]);
        return redirect()->back();
    }
}
