@extends('layouts.app')
@section('content')

<div class="page-content bg-white">
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
										<li><a href="{{route('candidate.profile')}}" >
											<i class="fa fa-user" aria-hidden="true"></i> 
											<span>Profile</span></a></li>
										<li><a href="{{route('candidate.resume')}}" class="active">
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

						
			



<div id="attach_resume_bx" class="job-bx bg-white m-b30">
								<h5 class="m-b10">Attach Resume</h5>
								<p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>

								<form class="attach-resume" action="{{route('candidate.resume.store')}}" method="post"  enctype="multipart/form-data">
								@csrf
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="form-group">
												<div class="custom-file">
													<p class="m-auto align-self-center">
													   <i class="fa fa-upload"></i>
													   Upload Resume File size is 3 MB
													</p>
	<input type="file" class="site-button form-control" name="resume">
												</div>
											</div>
										</div>
									</div>
									 <button class="btn btn-primary" type="submit"> Upload</button>
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