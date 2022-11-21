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

    public function view($id)
    {
        dd($id);
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
        $this->posts = BlogPost::all();
    }

    public function publish($id)
    {
        dd($id);
    }
}
