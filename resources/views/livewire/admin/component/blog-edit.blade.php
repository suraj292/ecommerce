<div class="card-body">
    <h4>Edit Post</h4>
    @if(session()->has('updated'))
        <div class="alert alert-success">{{ session('updated') }}</div>
        <div class="text-center">
            <a class="btn btn-primary m-2" href="{{ route('blog.detail', ['id'=>$blog->id]) }}" target="_blank">View Post</a>
{{--            <button class="btn btn-success m-2" wire:click="postPublish({{ $postId }})">Publish</button>--}}
        </div>
    @else
        <form method="post" wire:submit.prevent="updatePost">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" wire:model.defer="title">
                @error('title')<p class="text-danger mt-2">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>Blog Thumbnail</label>
                <input type="file" class="form-control" placeholder="Enter thumbnail" wire:model.defer="thumbnail">
                @error('thumbnail')<p class="text-danger mt-2">{{ $message }}</p>@enderror
            </div>
            <div class="form-group" wire:ignore>
                <label for="editor">Post</label>
                <textarea  type="text" class="form-control" placeholder="Enter Post" id="editor"> {{ $post }} </textarea>
                @error('post')<p class="text-danger mt-2">{{ $message }}</p>@enderror
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" placeholder="Enter Tags" wire:model.defer="tags">
                @error('tags')<p class="text-danger mt-2">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4 w-25">Save</button>
        </form>
        <script>
            //CKEDITOR.replace('editor');
            const editor = CKEDITOR.replace('editor', {
                filebrowserUploadUrl: "{{route('admin.blog.thumbnail', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
            editor.on('change', function(event){
                // console.log(event.editor.getData())
            @this.set('post', event.editor.getData())
            })
        </script>
    @endif

</div>
