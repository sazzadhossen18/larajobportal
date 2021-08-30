@extends('layouts.app')
@section('content')
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">{{$company->slogan}}</h1>
					
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-8">
							<div class="job-info-box">
							<h3 class="m-t0 m-b10 font-weight-700 title-head" style="margin-bottom:50px;">
									<a class="text-secondry m-r30">Company Name: {{$company->cname}}</a>
								</h3>
								

								<h5 class="font-weight-600">Company Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{{$company->description}}</p>
								
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
											<h4 class="text-black font-weight-700 p-t10 m-b15">Company Info</h4>
											<ul>

											<li><strong class="font-weight-700 text-black">Company Address:</strong> 
												{{$company->address}}
                      						 </li>

                      						 <li><strong class="font-weight-700 text-black">Company Phone:</strong> 
												{{$company->phone}}
                      						 </li>

                      						 <li><strong class="font-weight-700 text-black">Company Website:</strong> 
												{{$company->website}}
                      						 </li>
												
											</ul>
										</div>
									</div>
								</div>
                            </div>

						</div>


					</div>
				</div>
			</div>
            <!-- Job Detail -->
			<!-- Our Jobs -->
			<div class="section-full content-inner">
				<div class="container">
					<div class="row">
					@foreach($company->job as $job)
						<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="m-b30 blog-grid">
                                <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                                <div class="dez-info p-a20 border-1">
                                    <div class="dez-post-title ">
                                        <h5 class="post-title">
                          <a href="{{route('job.detail',$job->slug)}}">{{$job->title}}</a></h5>
                                    </div>
                                    <div class="dez-post-meta ">
                                        <ul>
                                            <li class="post-date"> <i class="fa fa-clock"></i> {{$job->type}} </li>
                                            <li class="post-author"> <i class="fa fa-map-marker"></i>{{$job->address}}</li>
                                        </ul>
                                    </div>
                                  
                                   <div class="dez-post-readmore"> 
										<a href="{{route('job.detail',$job->slug)}}" class="btn btn-primary">Apply This Job</a>
									</div>
                                </div>
                            </div>
						</div>
					@endforeach
						
					</div>
				</div>
			</div>
			<!-- Our Jobs END -->
		</div>
    </div>


@endsection