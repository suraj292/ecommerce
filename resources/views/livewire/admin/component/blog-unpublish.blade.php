<div class="col-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-body" style="overflow-y: auto;" wire:ignore>
            @if(session()->has('deleted'))
                <div class="alert alert-success">{{ session('deleted') }}</div>
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
                            <button class="btn btn-sm btn-primary" wire:click="view({{ $post->id }})">View</button>
                        </td>

                        <td>
                            <button class="btn btn-sm btn-primary" wire:click="edit({{ $post->id }})">Edit</button>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $post->id }})">Delete</button>
                        </td>

                        <td>
                            @if($post->publish)
                                <button class="btn btn-sm btn-danger" wire:click="unpublished({{ $post->id }})">Unpublished</button>
                            @else
                                <button class="btn btn-sm btn-success" wire:click="publish({{ $post->id }})">Publish</button>
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
@section('style')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/date-1.1.2/sb-1.3.1/sp-1.4.0/sl-1.3.4/datatables.min.css"/>
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>
@endsection
@section('script')
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/date-1.1.2/sb-1.3.1/sp-1.4.0/sl-1.3.4/datatables.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[2]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function () {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'DD MMM YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'DD MMM YYYY'
            });

            // DataTables initialisation
            var table = $('#dataTable').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
            /*
            Custom filter
            1. val = get value of th or dropdown
            2. grab column number-1
             */
            $('#dStatus').on('change', function () {
                var val = $('#dStatus').val();
                table.column(6)
                    .search(val ? '^' + $(this).val() + '$' : val, true, false)
                    .draw()
            });
        });
    </script>
@endsection
