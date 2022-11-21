<?php

namespace App\Http\Livewire\Admin\Component;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;
    public $blog;
    public $title, $thumbnail, $tags, $post;
    public $postId;
    public function render()
    {
        return view('livewire.admin.component.blog-edit');
    }

    public function mount()
    {
        $this->title = $this->blog->title;
        $this->thumbnail = $this->blog->thumbnail;
        $this->post = $this->blog->post;
        $this->tags = $this->blog->tags;
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required',
            'thumbnail' => 'required',
            'post' => 'required',
            'tags' => 'required',
        ]);
        if (is_string($this->thumbnail)){
            $file = $this->thumbnail;
        }elseif ($this->thumbnail->getMimeType() == 'image/jpeg') {
            $this->thumbnail->store('public/blog/thumbnail');
            $file = $this->thumbnail->hashName();
        }
        $data = BlogPost::find($this->blog->id);
        $data->update([
          'title' => $this->title,
            'thumbnail' => $file,
            'post' => $this->post,
            'tags' => $this->tags,
        ]);
        Session::flash('updated', 'Your Post has been updated.');
    }
}
