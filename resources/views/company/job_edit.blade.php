@extends('layouts.app')
@section('content')
<div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white p-t50 p-b20">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 m-b30">
							<div class="sticky-top">
								<div class="candidate-info company-info">



			<form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
				@csrf
									<div class="candidate-detail text-center">
										<div class="canditate-des">
											<a href="javascript:void(0);">
							<img alt="" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" style="height: 145px; width: 150px;">
											</a>
											<div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
												<input type="file" class="update-flie"  name="logo">
												<i class="fa fa-pencil"></i>
											</div>

										</div>



										<div class="candidate-title">
											<button class="btn btn-primary" type="submit"> Upload</button>
										</div>
									</div>


								</form>


									<ul>
										<li><a href="{{route('company.profile')}}">
											<i class="fa fa-user" aria-hidden="true"></i> 
											<span>Company Profile</span></a></li>
										<li><a href="{{route('company.jobpost')}}" class="active">
											<i class="fa fa-file-text" aria-hidden="true"></i> 
											<span>Post A Job</span></a></li>
										
										<li><a href="{{route('company.jobmanage')}}">
											<i class="fa fa-briefcase" aria-hidden="true"></i> 
											<span>Manage jobs</span></a></li>
										<li><a href="{{route('company.resume')}}">
											<i class="fa fa-id-card" aria-hidden="true"></i>
											<span>Manage Applicants</span></a></li>
										<li><a href="{{route('company.password')}}">
											<i class="fa fa-key" aria-hidden="true"></i> 
											<span>Change Password</span></a></li>
										<li>

											<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> 
											<i class="fa fa-sign-out" aria-hidden="true"></i> 
											<span>Log Out</span></a>

										  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-8 m-b30">


		@if(Session::has('flash_message_error')) 
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   

        @if(Session::has('flash_message_success')) 
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif 





<div class="job-bx submit-resume">
	<div class="job-bx-title clearfix">
		<h5 class="font-weight-700 pull-left text-uppercase">Update A Job</h5>
	</div>





		<form method="post" action="{{route('company.jobupdate',$job->id)}}">
			@csrf
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Job Title</label>
						<input type="text" name="title" value="{{$job->title}}" class="form-control" required>
					</div>
				</div>


				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Category Name</label>
						<select class="bs-select-hidden" name="category_id">
							<option value="0">Select Category</option>
							@foreach($categories as $cat)
							
                            <option value="{{$cat->id}}" {{$job->category_id=="$cat->id"? "selected":""}}>{{$cat->name}}</option>
							@endforeach
					</select>
					</div>
				</div>


				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Vacancy</label>
						<input type="text" class="form-control"  value="{{$job->position}}"  name="position" required>
					</div>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Salary</label>
						<input type="text" class="form-control" name="salary"  value="{{$job->salary}}"  required>
					</div>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Job Type</label>
						<select class="bs-select-hidden" name="type">


							 @if($job->type=='Full Time')
                                        <option selected>{{$job->type}}</option>
                                    @else
                                    <option value="Full Time">Full Time</option>
                                    @endif

                                        @if($job->type=='Part Time')
                                            <option selected>{{$job->type}}</option>
                                        @else
                                            <option value="Part Time">Part Time</option>
                                        @endif


                                        @if($job->type=='Internship')
                                            <option selected>{{$job->type}}</option>
                                        @else
                                            <option value="Internship">Internship</option>
                                        @endif


                                        @if($job->type=='Freelance')
                                            <option selected>{{$job->type}}</option>
                                        @else
                                            <option value="Freelance">Freelance</option>
                                        @endif


							
							
						</select>
					</div>
				</div>


				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Experience</label>
						<input type="text" name="roles"  value="{{$job->roles}}"  class="form-control" required>
					</div>
				</div>

				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Job Location</label>
						<input type="text" class="form-control"  value="{{$job->address}}"  name="address" required>
					</div>
				</div>
				
				
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Last Date</label>
						<input type="date" name="last_date"  value="{{$job->last_date}}"  class="form-control" required>
					</div>
				</div>



				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label>Status</label>
						<select class="bs-select-hidden" name="status">

							@if($job->status=='Active')
                           <option selected>{{$job->status}}</option>
                              @else
                             <option value="Active">Active</option>
                             @endif

                            @if($job->status=='Inactive')
                           <option selected>{{$job->status}}</option>
                              @else
                             <option value="Inactive">Inactive</option>
                             @endif
						</select>
						
					</div>
				</div>
				
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<label>Description</label>
						<textarea id="summernote" name="description" class="form-control" value="{{ $job->description }}"   cols="50" rows="10" required>
               
              			</textarea>
						
					</div>
				</div>

			</div>	

			<button type="submit" class="site-button m-b30">Submit</button>
		</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>

@endsection