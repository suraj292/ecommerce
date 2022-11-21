<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.admin-blog');
    }
    public function blogThumbnail(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    // Admin Blogs
    public function post()
    {
        $posts = BlogPost::all();
        return view('admin.blog-manage', ['posts' => $posts]);
    }

    // Public Blogs
    public function view()
    {
        $blogs = BlogPost::all();
        return view('blog', ['blogs' => $blogs]);
    }

    // Public Blog Detail
    public function detail(BlogPost $id)
    {
        $blog = BlogPost::find($id);
//        dd($blog[0]->title);
        return view('blog-detail', ['post' => $blog[0]]);
    }
}
