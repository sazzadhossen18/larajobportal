@extends('layouts.app')
@section('content')
<div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{asset('public/assets/images/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Login</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="section-full content-inner-2 shop-account">
            <!-- Product -->
            <div class="container">
                <div class="max-w500 m-auto bg-white m-b30">
                    <div class="p-a30 job-bx browse-job radius-sm seth">
                        <div class="tab-content nav">
                            
                    <form method="POST" action="{{ route('login') }}" class="tab-pane active col-12 p-a0 ">
                        @csrf
                                
                        <div class="form-group">
                                    <label class="font-weight-700">E-MAIL </label>
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PASSWORD </label>
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="text-left">
                                    <button class="btn btn-primary" type="submit">login</button>
                                   
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </div>
        <!-- contact area  END -->
    </div>

@endsection
