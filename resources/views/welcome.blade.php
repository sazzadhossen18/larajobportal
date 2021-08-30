@extends('layouts.app')
@section('content')
<div class="page-content">
    <!-- Section Banner -->
    <div class="dez-bnr-inr dez-bnr-inr-md" 
    style="background-image:url({{asset('public/assets/images/slide2.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m">
          <div class="find-job-bx">
  
            <h2>Search Between More Then <br> <span class="text-primary">@php $jobcount=App\Job::count()@endphp {{$jobcount}}</span> Open Jobs.</h2>
            <form action="{{url('/search/job')}}" method="GET">
            @csrf
              <div class="row">
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label>Job Title, Keywords, or Phrase</label>
                    <div class="input-group">
                      <input type="text" name="title" class="form-control">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="form-group">
                    <label>Address</label>
                    <div class="input-group">
                      <input type="text" name="address" class="form-control">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="form-group">
         
                  <select class="bs-select-hidden" name="category_id">
                    <option value="0">Select Category</option>
                @foreach(App\Category::all() as $data)
              
                <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
                    
                </select>
                </div>
                </div>
                <div class="col-lg-2 col-md-6">
                  <button type="submit"  class="btn btn-primary">Find Job</button>
                </div>
              </div>
            </form>
          </div>
        </div>
            </div>
        </div>
    <!-- Section Banner END -->
        <!-- About Us -->
    <div class="section-full job-categories content-inner-2 bg-white">
      <div class="container">
        <div class="section-head d-flex head-counter clearfix">
          <div class="mr-auto">
            <h2 class="m-b5">Popular Categories</h2>
            @php $categorycount=App\Category::count()@endphp 
            <h6 class="fw3">{{$categorycount}}+ Catetories work wating for you</h6>
          </div>
          <div class="head-counter-bx">
            <h2 class="m-b5 counter">
            @php $jobcount=App\Job::count()@endphp {{$jobcount}}</h2>
            <h6 class="fw3">Jobs Posted</h6>
          </div>
          
          <div class="head-counter-bx">
      @php 
      $freelancercount=App\User::where('user_type','seeker')->count()
      @endphp 
            <h2 class="m-b5 counter">{{$freelancercount}}</h2>
            <h6 class="fw3">Candidates</h6>
          </div>
        </div>
        <div class="row sp20">

        @foreach($categorys as $category)
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="icon-bx-wraper">
              <div class="icon-content">
                <a href="{{route('cagetory.job',$category->id)}}" class="dez-tilte">{{$category->name}}</a>
                <p class="m-a0">{{$category->jobs->count()}} Open Positions</p>
                <div class="rotate-icon"><i class="ti-location-pin"></i></div> 
              </div>
            </div>        
          </div>

 @endforeach
          
          
        </div>
      </div>
    </div>
    <!-- About Us END -->
   
    <!-- Our Job -->
    <div class="section-full bg-white content-inner-2">
      <div class="container">
        <div class="d-flex job-title-bx section-head">
          <div class="mr-auto">
            <h2 class="m-b5">Recent Jobs</h2>
            
          </div>
          <div class="align-self-end">
            <a href="{{route('job.all')}}" class="site-button button-sm">Browse All Jobs <i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <ul class="post-job-bx browse-job">

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
                        <li><i class="fa fa-calendar-check"></i> Published {{$job->created_at->diffForHumans()}}</li>
                      </ul>
                    </div>
                  </div>
                  
                  
                </div>
              </li>

             @endforeach

             
            </ul>
          
          </div>
          <div class="col-lg-3">
            <div class="sticky-top">
             
              <div class="quote-bx">
                <div class="quote-info">
                  <h4>Make a Difference with Your Online Resume!</h4>
                  <p>Your resume in minutes with JobBoard resume assistant is ready!</p>
                  <a href="#" class="site-button">Create an Account</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Our Job END -->  

     <!-- Call To Action -->
    <div class="section-full content-inner bg-gray">
      <div class="container">
        <div class="row">
        @php 
      $companycount=App\User::where('user_type','employee')->count()
      @endphp 
          <div class="col-lg-12 section-head text-center">
            <h2 class="m-b5">Companys</h2>
            <h6 class="fw4 m-b0">{{$companycount}}+ Companys Added Jobs</h6>
          </div>
        </div>
        <div class="row">
            @foreach($companys as $company)
          <div class="col-lg-4 col-sm-6 col-md-6 m-b30">
            <a href="">
              <div class="city-bx align-items-end  d-flex" style="background-image:url({{asset('public/assets/images/pic1.jpg')}})">
                <div class="city-info">
                  <h5>{{$company->cname}}</h5>
                </div>
              </div>
            </a>
          </div>

          @endforeach

        
        </div>
      </div>
    </div>
    <!-- Call To Action END -->


  
  </div>
@endsection
