@extends('admin.layout.adminapp')
@section('content')

<div class="container">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">

							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Social Media List </h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Social Media</a></li>
									<li class="breadcrumb-item active" aria-current="page"> Media List</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<a type="button" href="{{Route('socialmedia.create')}}" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fa fa-plus"></i> Add
                                    </a>
								</div>
							</div>
						</div>
						<!-- End Page Header -->
					
						<!-- Row -->


						<div class="row row-sm">
							<div class="col-lg-12">
								<div class="card custom-card  ">
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered border-bottom" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">S.NO</th>
														<th class="wd-25p">PLATFORM NAME</th>
														<th class="wd-20p">PLATFORM NAME</th>
														<th class="wd-15p">Action</th>
													</tr>
												</thead>
												<tbody>
													  @foreach($socialmedias as $socialmedia)
													<tr>
														<td>{{$socialmedia->id}}</td>
														<td>{{$socialmedia->platform_name}}</td>
														<td>{{$socialmedia->platform_url}}</td>
														</td>
														<td>
														<a class="btn btn-primary" href="{{Route('socialmedia.edit',$socialmedia->id)}}" type="button">Edit</a>

														
														<a class="btn btn-danger" href="{{ url('admin/socialmedia/delete/'. $socialmedia->id) }}" type="button">Delete</a>
														
														</td>
													</tr>
														
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
						<!-- End Row -->
</div>
</div>

@endsection