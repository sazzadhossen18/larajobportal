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
										<li><a href="{{route('company.jobpost')}}">
											<i class="fa fa-file-text" aria-hidden="true"></i> 
											<span>Post A Job</span></a></li>
										
										<li><a href="{{route('company.jobmanage')}}">
											<i class="fa fa-briefcase" aria-hidden="true"></i> 
											<span>Manage jobs</span></a></li>
										<li><a href="{{route('company.resume')}}" class="active">
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
							<div class="job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">Manage Applicants</h5>
									
								</div>

							
								<table class="table-job-bx cv-manager company-manage-job">
									<thead>
										<tr>
											<th>Name</th>
											<th>Mobile No</th>
											<th>Email</th>
											<th>Resume</th>
										</tr>
									</thead>
									<tbody>
@foreach($applicants as $applicant)
 @foreach($applicant->users as $user)

		<tr>
			
			<td class="job-name">
				{{$user->name}}
			</td>

			<td class="job-name">
				{{$user->profile->phone}}
				
			</td>


			<td class="job-name">
				{{$user->email}}
			</td>

			<td class="job-name">
			<a href="{{Storage::url($user->profile->resume)}}">Download</a>
			</td>
			
			
			
		</tr>

	@endforeach
@endforeach	


										
						</tbody>
				</table>
								
					
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>

@endsection