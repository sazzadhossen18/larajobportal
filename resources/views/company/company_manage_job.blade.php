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
										<li><a href="{{route('company.profile')}}" >
											<i class="fa fa-user" aria-hidden="true"></i> 
											<span>Company Profile</span></a></li>
										<li><a href="{{route('company.jobpost')}}">
											<i class="fa fa-file-text" aria-hidden="true"></i> 
											<span>Post A Job</span></a></li>
										
						<li><a href="{{route('company.jobmanage')}}" class="active">
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





							<div class="job-bx clearfix">
								<div class="job-bx-title clearfix">
									<h5 class="font-weight-700 pull-left text-uppercase">Manage jobs</h5>
									
								</div>
								<table class="table-job-bx cv-manager company-manage-job">
									<thead>
										<tr>
											
											<th>Job Title</th>
											<th>Date</th>
											<th>Status</th>
											<th>Action</th>

										</tr>
									</thead>
									<tbody>

  		 @foreach($jobs as $job)

		<tr>
			
			<td class="job-name">
			 		{{$job->title}}
				<ul class="job-post-info">
					<li><i class="fa fa-map-marker"></i>  {{$job->address}}</li>
					<li><i class="fa fa-bookmark-o"></i>{{$job->type}}</li>
				</ul>
			</td>
			<td class="expired pending">{{$job->last_date}} </td>
			<td class="expired pending">{{$job->status}} </td>
			<td class="job-links">
				<a href="{{route('company.jobedit',$job->id)}}">
				<i class="fa fa-eye"></i></a>
				<a href="{{route('company.jobdelete',$job->id)}}"><i class="fa fa-trash "></i></a>
			</td>
		</tr>

	@endforeach



										
				</tbody>
								</table>
								<div class="pagination-bx m-t30 float-right">
									<ul class="pagination">
										<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
										<li class="active"><a href="javascript:void(0);">1</a></li>
										<li><a href="javascript:void(0);">2</a></li>
										<li><a href="javascript:void(0);">3</a></li>
										<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
									</ul>
								</div>
								<!-- Modal -->
								<div class="modal fade modal-bx-info" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<div class="logo-img">
													<img alt="" src="images/logo/icon2.png">
												</div>
												<h5 class="modal-title">Company Name</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<ul>
													<li><strong>Job Title :</strong><p> Web Developer – PHP, HTML, CSS </p></li>
													<li><strong>Experience :</strong><p>5 Year 3 Months</p></li>
													<li><strong>Deseription :</strong>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since.</p></li>
												</ul>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal End -->
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>




@endsection