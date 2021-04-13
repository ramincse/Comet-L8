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
							<li class="breadcrumb-item active">Roles</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-lg-12 col-md-12">
					@include('validate')
					<a class="btn btn-sm btn-info mb-2" data-toggle="modal" href="#add_role_modal">Add New Role</a>
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">All Roles</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>permission</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($all_data as $data)
										<tr>
											<td>{{ $loop-> index + 1 }}</td>
											<td>{{ $data->name }}</td>
											<td>
												@foreach(json_decode($data->permission) as $permission)
												{{ $permission }} <span class="permission">,</span>
												@endforeach
											</td>
											<td>
												<div class="status-toggle">
													<input status_id="{{ $data->id }}" checked="{{ $data->status == true ? 'checked="checked"' : '' }}" type="checkbox" id="cat_status_{{ $loop-> index + 1 }}" class="check cat_check" />
													<label for="cat_status_{{ $loop-> index + 1 }}" class="checktoggle">checkbox</label>
												</div>
											</td>
											<td>
												<a id="edit_role" edit_id="{{ $data->id }}" class="btn btn-sm btn-warning" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
												<form class="d-inline" action="{{ route('role.destroy', $data->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button id="cat_delete_btn" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

			<!-- Add Role Modal -->
			<div id="add_role_modal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add new role</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('role.store') }}" method="POST">
								@csrf
								<div class="form-group">
									<input name="name" class="form-control" type="text" placeholder="Role Name">
								</div>

								<div class="form-group">
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Read" id=""> Read
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Write" id=""> Write
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Edit" id=""> Edit
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Delete" id=""> Delete
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="SEO" id=""> SEO
										</label>
									</div>
								</div>

								<div class="form-group">
									<input class="btn btn-block btn-info" type="submit" value="Add role">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Edit Role Modal -->
			<div id="edit_role_modal" class="modal fade">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Update Role</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('role.update', 1) }}" method="POST">
								@csrf
								@method('PUT')
								<div class="form-group">
									<input name="id" class="form-control" type="hidden" value="" >
									<input name="name" class="form-control" type="text" value="" >
								</div>

								<div class="form-group">
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Read" id=""> Read
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Write" id=""> Write
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Edit" id=""> Edit
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="Delete" id=""> Delete
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input name="per[]" type="checkbox" value="SEO" id=""> SEO
										</label>
									</div>
								</div>

								<div class="form-group">
									<input class="btn btn-block btn-info" type="submit" value="Update role">
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