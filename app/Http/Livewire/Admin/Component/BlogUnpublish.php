<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class BlogUnpublish extends Component
{
    public $posts;
    public function render()
    {
        return view('livewire.admin.component.blog-unpublish');
    }

    public function edit($id)
    {
        dd($id);
    }

    public function delete($id)
    {
        $post = BlogPost::find($id);
        $post->delete();
        Session::flash('deleted', 'Post has been successfully Deleted.');
//        $this->posts = BlogPost::all();
        return redirect(route('admin.blog.post'))->with('deleted', 'Post has been successfully Deleted.');
    }

    public function publish($id)
    {
        $post = BlogPost::find($id);
        $post->update([
            'publish' => true,
        ]);
        Session::flash('Published', 'Your Post has been successfully Published.');
//        $this->redirect(route('admin.blog.post'));
        return redirect(route('admin.blog.post'))->with('Published', 'Your Post has been successfully Published.');
    }

    public function unpublished($id)
    {
        $post = BlogPost::find($id);
        $post->update([
            'publish' => false,
        ]);
//        Session::flash('Unpublished', 'Your Post has been Unpublished.');
        return redirect(route('admin.blog.post'))->with('Unpublished', 'Your Post has been Unpublished.');
    }
}