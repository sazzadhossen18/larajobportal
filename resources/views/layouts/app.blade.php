<!doctype html>
<html>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JobBoard - Application</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- STYLESHEETS -->
   <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/plugins.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/font-awesome.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/font-awesome.css')}}">

     <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/summernote-bs4.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/templete.min.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('public/assets/css/skin/skin-1.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;600;700;800&family=Roboto:wght@100&family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
.bt-buy-now{
    display: none;
}
.bt-support-now{
    display: none;
}
.switcher-btn-bx{
    display: none;
}
.at-expanding-share-button-toggle {
    display: none;
}

</style>
</head>
<body>
   
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
    <!-- header -->
    <header class="site-header mo-left header fullwidth">

        <!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
                        <a href="{{url('/')}}"><img src="{{asset('public/assets/images/logo.png')}}" class="logo" alt=""></a>
                    </div>
                    <!-- nav toggle button -->
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="{{route('employeer.register')}}" class="btn btn-primary"></i>Employers</a>
                            <a href="{{route('register')}}" class="btn btn-primary">Candidates</a>

                        @if(empty(Auth::user()))
                            <a href="{{route('login')}}" class="btn btn-primary"> Sign In </a>
                        @endif
                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                    <a href="{{route('candidate.profile')}}" class="btn btn-primary">My Profile </a>
                    @endif

                    @if(Auth::check()&&Auth::user()->user_type=='employee')
                    <a href="{{route('company.profile')}}" class="btn btn-primary">My Profile </a>
                    @endif

                        </div>
                       

                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">

                            <li class="active">
                                <a href="{{route('job.all')}}">My Jobs</a>
    
                            </li>
                          
                          
                          
                          
                        </ul>           
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->


@yield('content')



    <!-- Footer -->
    <footer class="site-footer" style="margin-top: 50px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <img src="images/logo-white.png" width="180" class="m-b15" alt=""/>
                            <p class="text-capitalize m-b20">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the.</p>
                            <div class="subscribe-form m-b20">
                                <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                                    <div class="dzSubscribeMsg"></div>
                                    <div class="input-group">
                                        <input name="dzEmail" required="required"  class="form-control" placeholder="Your Email Address" type="email">
                                        <span class="input-group-btn">
                                            <button name="submit" value="Submit" type="submit" class="btn btn-primary">Subscribe</button>
                                        </span> 
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                        <div class="widget border-0">
                            <h5 class="m-b30 text-white">Frequently Asked Questions</h5>
                            <ul class="list-2 list-line">
                                <li><a href="javascript:void(0);">Privacy & Seurty</a></li>
                                <li><a href="javascript:void(0);">Terms of Serice</a></li>
                                <li><a href="javascript:void(0);">Communications</a></li>
                                <li><a href="javascript:void(0);">Referral Terms</a></li>
                                <li><a href="javascript:void(0);">Lending Licnses</a></li>
                                <li><a href="javascript:void(0);">Support</a></li>
                                <li><a href="javascript:void(0);">How It Works</a></li>
                                <li><a href="javascript:void(0);">For Employers</a></li>
                                <li><a href="javascript:void(0);">Underwriting</a></li>
                                <li><a href="javascript:void(0);">Contact Us</a></li>
                                <li><a href="javascript:void(0);">Lending Licnses</a></li>
                                <li><a href="javascript:void(0);">Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="widget border-0">
                            <h5 class="m-b30 text-white">Find Jobs</h5>
                            <ul class="list-2 w10 list-line">
                                <li><a href="javascript:void(0);">US Jobs</a></li>
                                <li><a href="javascript:void(0);">Canada Jobs</a></li>
                                <li><a href="javascript:void(0);">UK Jobs</a></li>
                                <li><a href="javascript:void(0);">Emplois en Fnce</a></li>
                                <li><a href="javascript:void(0);">Jobs in Deuts</a></li>
                                <li><a href="javascript:void(0);">Vacatures China</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </footer>
    <!-- Footer END -->
    <button class="scroltop fa fa-chevron-up"></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{asset('public/assets/css/combining.js')}}"></script>
<script src="{{asset('public/assets/css/summernote-bs4.min.js')}}"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>


<!-- COMBINING JS  -->
</body>
</html>
