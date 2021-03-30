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
							<li class="breadcrumb-item active">Dashboard</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<a class="btn btn-sm btn-info mb-2" href="">Add new post</a>
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">All Posts</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>John</td>
											<td>Doe</td>
											<td>
												<a class="btn btn-sm btn-info" href="">View</a>
												<a class="btn btn-sm btn-warning" href="">Edit</a>
												<a class="btn btn-sm btn-danger" href="">Delete</a>
											</td>
										</tr>
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