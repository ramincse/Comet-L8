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
							<li class="breadcrumb-item active">Tag</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-lg-12 col-md-12">
					@include('validate')
					<a class="btn btn-sm btn-info mb-2" data-toggle="modal" href="#add_tag_modal">Add New Tag</a>
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">All Tags</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Slug</th>
											<th>Time</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($all_data as $data)
										<tr>
											<td>{{ $loop-> index + 1 }}</td>
											<td>{{ $data->name }}</td>
											<td>{{ $data->slug }}</td>
											<td>{{ $data->created_at->diffForHumans() }}</td>
											<td>
												<div class="status-toggle">
													<input status_id="{{ $data->id }}" type="checkbox" id="cat_status_{{ $loop-> index + 1 }}" class="check tag_check" {{ $data->status == true ? 'checked="checked"' : '' }} />
													<label for="cat_status_{{ $loop-> index + 1 }}" class="checktoggle">checkbox</label>
												</div>
											</td>
											<td>
												<!-- <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
												<a edit_id="{{ $data->id }}" class="btn btn-sm btn-warning edit_tag" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
												<form class="d-inline" action="{{ route('tag.destroy', $data->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button id="tag_delete_btn" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

			<!-- Add Tag Modal -->
			<div id="add_tag_modal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add New Tag</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('tag.store') }}" method="POST">
								@csrf
								<div class="form-group">
									<input name="name" class="form-control" type="text" placeholder="Name">
								</div>
								<div class="form-group">
									<input class="btn btn-block btn-info" type="submit" value="Add Tag">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Edit Tag Modal -->
			<div id="edit_tag_modal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Update Tag</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('tag.update', 1) }}" method="POST">
								@csrf
								@method('PUT')
								<div class="form-group">
									<input name="edit_id" class="form-control" type="hidden" placeholder="Name">
									<input name="name" class="form-control" type="text" placeholder="Name">
								</div>
								<div class="form-group">
									<input class="btn btn-block btn-info" type="submit" value="Update Tag">
								</div>
							</form>
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