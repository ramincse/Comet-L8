@extends('admin.layouts.app')
@section('main-content')
<div class="main-wrapper">

    <!-- Header -->
    @include('admin.layouts.header')
    <!-- /Header -->

    <!-- Sidebar -->
    @include('admin.layouts.menu')
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Posts</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    @include('validate')
                    <a class="btn btn-sm btn-info mb-2" href="{{ route('post.create') }}">Add New Post</a>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Posts (Trash)</h4>
                            <a class="badge badge-info" href="{{ route('post.index') }}">Published {{ ($published == 0 ? '' : $published) }}</a>
                            <a class="badge badge-danger" href="{{ route('post.trash') }}">Trash {{ ($trash == 0 ? '' : $trash) }}</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Post Type</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_data as $data)

                                        @php
                                        $featured_data = json_decode($data->featured);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop-> index + 1 }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $featured_data->post_type }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $data->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="status-toggle">
                                                    <input status_id="{{ $data->id }}" type="checkbox" id="cat_status_{{ $loop-> index + 1 }}" class="check tag_check" {{ $data->status == true ? 'checked="checked"' : '' }} />
                                                    <label for="cat_status_{{ $loop-> index + 1 }}" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('post.trash.update', $data->id) }}"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                                <form class="d-inline" action="{{ route('post.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="post_delete_btn" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

@endsection