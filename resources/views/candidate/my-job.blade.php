
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
										<li><a href="{{route('candidate.resume')}}">
											<i class="fa fa-file-text" aria-hidden="true"></i> 
											<span>My Resume</span></a></li>

								<li><a href="{{route('my.job')}}" class="active">
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
							<div class="job-bx save-job table-job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">My Jobs</h5>
									
								</div>
								<table>
									<thead>
										<tr>
											
											<th>jobs Title</th>
											<th>jobs Adress</th>
											<th>Last Date</th>
											
										</tr>
									</thead>
									<tbody>



	@foreach($myjobs as $save)

		<tr>
			
			<td class="job-name">
				{{$save['jobs']['title']}}
			</td>

			<td class="job-name">
				{{$save['jobs']['address']}}
			</td>
			
			<td class="date">{{$save['jobs']['last_date']}}</td>
			
		</tr>
		
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