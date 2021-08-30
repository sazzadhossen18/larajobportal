@extends('layouts.app')
@section('content')
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Job Detail</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="{{url('/')}}">Home</a></li>
							<li>Job Detail</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
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
            <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-8">
							<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a class="text-secondry m-r30">{{$job->title}}</a>
									
								</h3>
								<div class="company text-right">
									<a href="{{route('company.index',$job->company->slug)}}">View all jobs of this company</a>
									</div>
								
                                </a>

								<h5 class="font-weight-600">{{$job->company->cname}}
								</h5>

								
								<h5 class="font-weight-600">Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{!! $job->description !!}</p>
								
		
   		 <form action="{{route('job.apply',$job->id)}}" method="post">
       		 @csrf
       		 
    		<div class="card-body">
      		  <button class="btn btn-primary" type="submit">Apply This Job</button>
               
    		</div>
    	</form>
    
    	
    		
    	
    
   

							


							</div>
						</div>
						<div class="col-lg-4">
							<div class="sticky-top">
								<div class="row">
									<div class="col-lg-12 col-md-6">
										<div class="m-b30">
											<img src="images/blog/grid/pic1.jpg" alt="">
										</div>
									</div>
									<div class="col-lg-12 col-md-6">
										<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
											<h4 class="text-black font-weight-700 p-t10 m-b15">Job Summary</h4>
											<ul>


												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address:</strong><span class="text-black-light">{{$job->address}} </span></li>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Vacancy:</strong><span class="text-black-light">{{$job->position}} </span></li>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Job Type:</strong><span class="text-black-light">{{$job->type}} </span></li>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Experience:</strong><span class="text-black-light">{{$job->roles}} </span></li>
												

												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Salary:</strong>
												<span class="text-black-light">{{$job->salary}} </span>
												</li>

												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Last Date:</strong><span class="text-black-light">{{$job->last_date}} </span></li>




						
		
											</ul>


	 <form action="{{route('job.favourite',$job->id)}}" method="post">
       		 @csrf
       		 <input type="hidden" value="{{$job->id}}" name="job_id">
    		<div class="card-body" >
      		  <button class="btn btn-primary" type="submit">Favourite This Job</button>
               
    		</div>
    </form>



<div class="card-body" >
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Job Share By Email
</button>   
</div>
    		
    
    

    
    	
										</div>
									</div>
								</div>
                            </div>

						</div>


					</div>
				</div>
			</div>
            <!-- Job Detail -->
			
		</div>
    </div>


<!-- Modal Box -->
	<div class="modal fade lead-form-modal" id="exampleModal" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body row m-a0 clearfix">
					
					<div class="col-lg-6 col-md-6 p-a0">
						<div class="lead-form browse-job text-left">

						<form action="{{route('job.mail')}}" method="post">
								@csrf

								<input type="hidden" name="job_slug" value="{{$job->slug}}">
								
								<div class="form-group">
									<label>Your Name</label>
									<input class="form-control" name="your_name" />
								</div>	
								<div class="form-group">
									<label>Your Email</label>
									<input value="" class="form-control" name="your_email"/>
								</div>
								<div class="form-group">
									<label>Friend Name</label>
									<input class="form-control" name="friend_name" />
								</div>	
								<div class="form-group">
									<label>Friend Email</label>
									<input class="form-control"  name="friend_email" />
								</div>
								<div class="clearfix">
									<button type="submit" class="btn btn-primary ">Submit </button>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- Modal Box End -->








@endsection