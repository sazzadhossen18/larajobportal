@extends('layouts.app')

@section('content')


<div class="page-content">
        <!-- inner page banner -->
         <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Employers Register</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Employers Register</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner browse-job shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 m-b30">
                        <div class="p-a30 job-bx max-w500 radius-sm bg-white m-auto">
                            <div class="tab-content">


    <form method="POST" action="{{ route('employeer.register.store') }}">
                 @csrf
            <input type="hidden" value="employee" name="user_type">

                                  
                <div class="form-group">
                    <label class="font-weight-700">Companey Name </label>
                    <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>






<div class="form-group">
<label class="font-weight-700">E-MAIL</label>
 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>

                       

<div class="form-group">
     <label class="font-weight-700">Password </label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
   
</div>



<div class="form-group">
    <label class="font-weight-700"> Confirm Password</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
   
</div>

                           


 <div class="text-left">
      <button type="submit" class="btn btn-primary">Register</button>
 </div>



                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </div>
        <!-- contact area  END -->
    </div>

@endsection
