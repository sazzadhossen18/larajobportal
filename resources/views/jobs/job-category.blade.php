@extends('layouts.app')
@section('content')


<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">{{$categoryName->name}}</h1>
					
                </div>
            </div>
        </div>




        <!-- inner page banner END -->
		<!-- Filters Search -->
		<div class="section-full browse-job-find">
			<div class="container">
				<div class="find-job-bx">
				<form action="{{route('search.job')}}" method="GET">
						@csrf
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Job Title, Keywords, or Phrase</label>
									<div class="input-group">
										<input type="text" name="search" class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fa fa-search"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<label>Location</label>
									<div class="input-group">
										<input type="text" name="search" class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<select class="bs-select-hidden">
										<option>Select Sector</option>
										<option>Construction</option>
										<option>Corodinator</option>
										<option>Employer</option>
										<option>Financial Career</option>
										<option>Information Technology</option>
										<option>Marketing</option>
										<option>Quality check</option>
										<option>Real Estate</option>
										<option>Sales</option>
										<option>Supporting</option>
										<option>Teaching</option> 
									</select>

								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<button type="submit" class="site-button btn-block">Find Job</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Filters Search END -->



        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full browse-job p-b50">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-5 m-b30">

				<form action="{{route('search.job')}}" method="GET">
						@csrf
							
								<div class="form-group">
									<label>Job Title, Keywords, or Phrase</label>
									<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fa fa-search"></i></span>
										</div>
									</div>
								</div>
						
							
								<div class="form-group">
									<label>Location</label>
									<div class="input-group">
										<input type="text" name="search"  class="form-control" placeholder="">
										<div class="input-group-append">
										  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
										</div>
									</div>
								</div>
						
								<div class="form-group">
									<select class="bs-select-hidden">
										<option>Select Sector</option>
										<option>Construction</option>
										<option>Corodinator</option>
										<option>Employer</option>
										<option>Financial Career</option>
										<option>Information Technology</option>
										<option>Marketing</option>
										<option>Quality check</option>
										<option>Real Estate</option>
										<option>Sales</option>
										<option>Supporting</option>
										<option>Teaching</option> 
									</select>

								</div>
						
							
							
								<button type="submit" class="btn btn-primary">Find Job</button>
							
						
					</form>
						</div>


						<div class="col-xl-9 col-lg-8 col-md-7">
							<div class="job-bx-title clearfix">
								<h5 class="font-weight-700 pull-left text-uppercase">All Jobs </h5>
								
							</div>
							<ul class="post-job-bx">
@foreach($jobs as $job)
		<li>
                <div class="post-bx">
                  <div class="d-flex m-b30">
                    <div class="job-post-company">
                      <span><img alt="job" src="{{asset('public/assets')}}/images/icon1.png"></span>
                    </div>
                    <div class="job-post-info">
                      <h4><a href="{{route('job.detail',$job->slug)}}">{{$job->title}}</a></h4>
                      <ul>
                        <li><i class="fa fa-map-marker"></i>{{$job->address}}</li>
                        <li><i class="fa fa-clock"></i>  {{$job->type}}</li>
                        <li><i class="fa fa-calendar-check"></i> Published


{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</li>
                      </ul>
                    </div>
                  </div>
                  <div class="d-flex">
            
                    <div class="salary-bx">
                     
                    </div>
                  </div>
                
                </div>
              </li>					

 @endforeach
								
							</ul>
							<div class="pagination-bx float-right m-t30">
								<ul class="pagination">
									<li class="previous"><a href="javascript:void(0);"><i class="fa fa-arrow-left"></i> Prev</a></li>
									<li class="active"><a href="javascript:void(0);">1</a></li>
									<li><a href="javascript:void(0);">2</a></li>
									<li><a href="javascript:void(0);">3</a></li>
									<li class="next"><a href="javascript:void(0);">Next <i class="fa fa-arrow-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
		
</div>

 @endsection