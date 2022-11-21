<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body" style="overflow-y: auto;" wire:ignore>
                @if(session()->has('deleted'))
                    <div class="alert alert-success">{{ session('deleted') }}</div>
                @endif
                @if(session()->has('Published'))
                    <div class="alert alert-success">{{ session('Published') }}</div>
                @endif
                @if(session()->has('Unpublished'))
                    <div class="alert alert-danger">{{ session('Unpublished') }}</div>
                @endif
                <h4 class="card-title">Posts</h4>
                <table id="dataTable" class="table table-striped table-bordered table-sm">
                    <thead>
                    {{--                            <form>--}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Created Date From:</label>
                            <input type="text" class="form-control" id="min">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Created Date To:</label>
                            <input type="text" class="form-control" id="max">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dStatus">Order Status</label>
                            <select id="dStatus" class="form-control">
                                <option value selected>All</option>
                                <option value="1">Published</option>
                                <option value="0">Pending</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <br>
                            <button type="button" class="btn btn-primary" id="search">search</button>
                        </div>
                    </div>
                    {{--                            </form>--}}
                    <tr>
                        <th class="th-sm">Title
                        </th>
                        <th class="th-sm">Thumbnail
                        </th>
                        <th class="th-sm">tags
                        </th>
                        <th class="th-sm">View Post
                        </th>
                        <th class="th-sm">Edit/Delete
                        </th>
                        <th class="th-sm">Publish/pending</th>
                        <th style="display: none;">status</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($posts as $post)
                        <tr {{--wire:click="getOrder({{ $post->id }})"--}}>
                            <td class="text-uppercase">{{ $post->title }}</td>

                            <td>
                                <img src="{{ asset('storage/blog/thumbnail/'.$post->thumbnail) }}" alt="">
                            </td>

                            <td>{{ $post->tags }}</td>

                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('blog.detail', ['id'=>$post->id]) }}"
                                   target="_blank">View</a>
                            </td>

                            <td>
                                <button class="btn btn-sm btn-primary" wire:click="edit({{ $post->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $post->id }})">Delete
                                </button>
                            </td>

                            <td>
                                @if($post->publish)
                                    <button class="btn btn-sm btn-danger" wire:click="unpublished({{ $post->id }})">
                                        Unpublished
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-success" wire:click="publish({{ $post->id }})">
                                        Publish
                                    </button>
                                @endif
                            </td>
                            <td style="display: none;">{{ $post->publish }}</td>
                        </tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                    <tr>
                        <th class="th-sm">Title
                        </th>
                        <th class="th-sm">Thumbnail
                        </th>
                        <th class="th-sm">tags
                        </th>
                        <th class="th-sm">View Post
                        </th>
                        <th class="th-sm">Edit/Delete
                        </th>
                        <th class="th-sm">Publish/Unpublished</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    @if($edit)
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <livewire:admin.component.blog-edit :blog="$edit" />
        </div>
    </div>
    @endif
</div>

