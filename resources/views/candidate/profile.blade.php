@extends('layouts.app')
@section('content')

<div class="page-content bg-white">


<div class="overlay-black-dark profile-edit p-t50 p-b20" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="row">
					<div class="col-lg-8 col-md-7 candidate-info">
						<div class="candidate-detail">
							
							<div class="text-white browse-job text-left">
								<h4 class="m-b0">{{Auth::user()->name}}
									
								</h4>
								<p class="m-b15">{{Auth::user()->profile->cover_letter}}</p>
								<ul class="clearfix">
									<li><i class="ti-location-pin"></i>{{Auth::user()->profile->address}}</li>
									<li><i class="ti-mobile"></i>{{Auth::user()->profile->phone}}</li>
									<li><i class="ti-briefcase"></i> {{Auth::user()->profile->experience}}</li>
									<li><i class="ti-email"></i> {{Auth::user()->email}}</li>
								</ul>
				
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-5">
					
							<div class="pending-info text-white p-a25">
								<h5>Description</h5>
								<ul class="list-check secondry">
									{{Auth::user()->profile->bio}}
								</ul>
							</div>
					
					</div>
				</div>
            </div>
			
        </div>



		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 m-b30">
							<div class="sticky-top">
								<div class="candidate-info">

				<form action="{{route('candidate.avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
									<div class="candidate-detail text-center">
										<div class="canditate-des">
											<a href="javascript:void(0);">
	<img alt="" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" style="height: 145px; width: 150px;">
											</a>
											<div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
												<input type="file" class="update-flie" name="avatar">
												<i class="fa fa-camera"></i>
											</div>
										</div>
										<div class="candidate-title">
											 <button class="btn btn-primary" type="submit"> Upload</button>
										</div>
									</div>

								</form>

									<ul>
										<li><a href="{{route('candidate.profile')}}" class="active">
											<i class="fa fa-user" aria-hidden="true"></i> 
											<span>Profile</span></a></li>
										<li><a href="{{route('candidate.resume')}}">
											<i class="fa fa-file-text" aria-hidden="true"></i> 
											<span>My Resume</span></a></li>

									<li><a href="{{route('my.job')}}">
											<i class="fa fa-id-card" aria-hidden="true"></i>
											<span>My Job</span></a></li>


										<li><a href="{{route('job.favourite.candidate')}}">
											<i class="fa fa-heart" aria-hidden="true"></i> 
											<span>Saved Jobs</span></a></li>
										
										
				
										<li><a href="{{route('candidate.password')}}">
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

							<div class="job-bx job-profile">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">Basic Information</h5>
								</div>

								<form action="{{route('candidate.profile.update')}}" method="post">
									@csrf
									<div class="row m-b30">
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Position:</label>
												<input type="text" class="form-control" name="cover_letter">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Your Address:</label>
												<input type="text" class="form-control" name="address">
											</div>
										</div>
									
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Your Phone Number:</label>
												<input type="text" class="form-control" name="phone">
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Experience:</label>
												<input type="text" class="form-control" name="experience">
											</div>
										</div>
										
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Age:</label>
												<input type="text" class="form-control" name="age">
											</div>
										</div>
									
									
									</div>
								
									<div class="rwo">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<label>Biography:</label>
												<textarea name="bio"  class="form-control" cols="70" rows="4"></textarea>
											</div>
										</div>
									</div>
									
									<button class="site-button m-b30" type="submit">Save Setting</button>
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