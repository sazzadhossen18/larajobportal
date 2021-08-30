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
										<li><a href="company-profile.html" class="active">
											<i class="fa fa-user" aria-hidden="true"></i> 
											<span>Company Profile</span></a></li>
										<li><a href="{{route('company.jobpost')}}">
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
									<h5 class="font-weight-700 pull-left text-uppercase">Company Information</h5>
									
								</div>
								
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Company Name</label>
												<input type="text" class="form-control" placeholder="Enter Company Name" value="{{Auth::user()->company->cname}}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label> Email</label>
												<input type="email" class="form-control" placeholder="info@gmail.com" value="{{Auth::user()->email}}">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" placeholder="Website Link" value="{{Auth::user()->company->address}} ">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Phone </label>
												<input type="text" class="form-control" value="{{Auth::user()->company->phone}} ">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Website</label>
												<input type="text" class="form-control" value="{{Auth::user()->company->website}}">
											</div>
										</div>

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Slogan</label>
												<input type="text" class="form-control" value="{{Auth::user()->company->slogan}}">
											</div>
										</div>


										



										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Description:</label>
												<textarea class="form-control">
													{{Auth::user()->company->description}}
												</textarea>
											</div>
										</div>
									</div>
									<!-- Contact Information -->
									<div class="job-bx-title clearfix">
										<h5 class="font-weight-700 pull-left text-uppercase">Contact Information</h5>
									</div>


	<form action="{{route('company.profile.update')}}" method="post">
		@csrf

									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Phone</label>
												<input type="text" class="form-control" placeholder="+1 123 456 7890" name="phone">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" >
											</div>
										</div>

										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Website Link</label>
												<input type="text" class="form-control" name="website">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Slogan</label>
												<input type="text" class="form-control" name="slogan">
											</div>
										</div>

										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Description:</label>
												<textarea class="form-control" name="description">
													
												</textarea>
											</div>
										</div>
										
									</div>
									<button type="submit" class="site-button m-b30">Update Setting</button>
									
									</form>	
									</div>
									
								
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>

@endsection