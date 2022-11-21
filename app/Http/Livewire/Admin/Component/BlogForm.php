<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;


class BlogForm extends Component
{
    use WithFileUploads;
    public $title, $thumbnail, $post, $tags;
    public $postId;
    public function render()
    {
        return view('livewire.admin.component.blog-form');
    }

    public function savePost()
    {
        $data = $this->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'post' => 'required',
            'tags' => 'required',
        ]);
        $this->thumbnail->store('public/blog/thumbnail');

        $post = BlogPost::create([
            'title' => $this->title,
            'thumbnail' => $this->thumbnail->hashName(),
            'post' => $this->post,
            'tags' => $this->tags,
        ]);
        $this->postId = $post->id;
//        $this->title = $this->thumbnail = $this->post = $this->tags = null;
        Session::flash('saved', 'Your Post has been saved.');
    }

    public function postPublish($id)
    {
        $post = BlogPost::find($id);
        $post->update(['publish' => true]);
        return redirect()->back();
    }
}
