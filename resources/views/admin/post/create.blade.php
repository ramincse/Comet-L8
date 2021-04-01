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
				<div class="col-lg-12 col-md-12 d-flex">
					@include('validate')
					<div class="card flex-fill">
						<div class="card-header">
							<h4 class="card-title">Add New Post</h4>
						</div>
						<div class="card-body">
							<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Post Type</label>
									<div class="col-lg-9">
										<select name="post_type" id="post_format" class="form-control">
											<option>-select-</option>
											<option value="Image">Image</option>
											<option value="Gallery">Gallery</option>
											<option value="Audio">Audio</option>
											<option value="Video">Video</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Post Title</label>
									<div class="col-lg-9">
										<input name="title" type="text" class="form-control" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Post Category</label>
									<div class="col-lg-9">
										@foreach($all_call as $category)
										<div class="checkbox">
											<label> <input type="checkbox" name="cat[]" value="{{ $category->id }}" /> {{ $category->name }} </label>
										</div>
										@endforeach
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Post Tag</label>
									<div class="col-lg-9">
										<select name="tag[]" id="" class="form-control post_tag_select" multiple="multiple">
											@foreach($all_tags as $tag)
											<option value="{{ $tag->id }}">{{ $tag->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="post-image">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Feature Image</label>
										<div class="col-lg-9">
											<img class="shadow mb-4" style="width: 150px; height: 150px; border: 1px solid #ccc; border-radius: 4px; display: block;" src="" alt="" id="post_feat_image_load">
											<input style="display: none;" id="post_feat_image" name="image" type="file">
											<label for="post_feat_image"><img style="width: 60px; height: 60px; cursor: pointer;" src="{{ URL::to('/') }}/admin/assets/img/camera.jpg" alt=""></label>
										</div>
									</div>
								</div>

								<div class="post-gallery">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Post Gallery</label>
										<div class="col-lg-9">
											<div class="post-gallery-img mb-4"></div>
											<input style="display: none;" name="post_gall[]" id="post_gall_image" name="" type="file" multiple>
											<label for="post_gall_image"><img style="width: 60px; height: 60px; cursor: pointer;" src="{{ URL::to('/') }}/admin/assets/img/camera.jpg" alt=""></label>
										</div>
									</div>
								</div>

								<div class="post-audio">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Post Audio Link</label>
										<div class="col-lg-9">
											<input name="post_audio" type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="post-video">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Post Video Link</label>
										<div class="col-lg-9">
											<input name="post_video" type="text" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Post Content</label>
									<div class="col-lg-9">
										<textarea name="content" id="post_ek_editor" class="form-control"></textarea>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary">Add Post</button>
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