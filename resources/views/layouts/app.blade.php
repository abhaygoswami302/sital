<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
       
        /* Tabs*/
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
	background: #007b5e;
    color: black;
}
#tabs h6.section-title{
    color: black;
}
.nav .nav-item{
    color:rgb(83, 82, 82);
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: gray;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 1px solid !important;
    font-size: 15px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: black;
    font-size: 20px;
}

/*** Home  ***/

.Blad_Stu .box {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px
}

.Blad_Stu .our-services {
    margin-top: 75px;
    padding-bottom: 30px;
    padding: 0 60px;
    min-height: 198px;
    text-align: center;
    border-radius: 10px;
    background-color: #fff;
    transition: all .4s ease-in-out;
    box-shadow: 0 0 25px 0 rgba(20, 27, 202, .17)
}

.Blad_Stu .our-services .icon {
    margin-bottom: -21px;
    transform: translateY(-50%);
    text-align: center
}
.Blad_Stu a {
    color: rgb(41, 41, 41);
    text-decoration: none;
}
.Blad_Stu .our-services:hover h4,
.Blad_Stu .our-services:hover p {
    color: #fff
}

.Blad_Stu .speedup:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(black, #b79359, #b79359 0%, black 100%)
}

.Blad_Stu .settings:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(to top,black, #b79359, #b79359 0%, black 100%);
    color: black!important;
}

.Blad_Stu .privacy:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(black, #b79359, #b79359 0%, black 100%)
}

.Blad_Stu .backups:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(black, #b79359, #b79359 0%, black 100%)
}

.Blad_Stu .ssl:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(black, #b79359, #b79359 0%, black 100%)
}

.Blad_Stu .database:hover {
    box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
    cursor: pointer;
    background-image: linear-gradient(black, #b79359, #b79359 0%, black 100%)
}
.Blad_Stu{
    float:left;
    width: 100%;
}
.Blad_Stu a .our-services{
    padding-bottom: 15px;
    padding-bottom: 10px !important;
    min-height: 218px;
}
.Blad_Stu a:hover ,
.Blad_Stu a:hover h4 ,
.Blad_Stu a:hover p{
    text-decoration: none;
}
</style>
@livewireStyles
</head>
<body style="background: url({{ asset('images/patteren.png') }});background:#b79359;color:black">
    <!-- /* background:linear-gradient(to right,
#ac8e68 16%, #f1f0e7 16% 40%, #ac8e68 40% 60%, #f1f0e7 60% 84%, #ac8e68 84%);}; */ -->
    <div id="app" >
        <nav class="navbar navbar-expand-md bg-dark navbar-dark shadow-sm p-0 m-0" 
        style="background:black;font-family:Playfair Display;font-weight:600" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}" >
                    <img src="{{ asset('images/king.png') }}" alt="" style="height:65px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: auto">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item">
                          <a class="nav-link alert alert-secondary" style="color:black;padding:7px 25px;margin-right:10px;border:none;font-weight:600;background:#b79359" href="{{ route('verify.email') }}">Verify Email</a>
                        </li>
                        @endauth
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <!--li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li-->
                            @endif

                            @if (Route::has('register'))
                                <!--li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li-->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:black;padding:7px 25px;font-weight:600;border:none;background:#b79359" class="nav-link alert alert-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="font-family: Roboto" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('student.create') }}" class="dropdown-item"> 
                                        Add New Student
                                    </a>
                                    <a href="{{ route('fee.otp') }}" class="dropdown-item"> 
                                        Add Fee Details
                                    </a>
                                    <a href="{{ route('student.details.otp') }}" class="dropdown-item"> 
                                        View Student Details
                                    </a>
                                    <hr>
                                    <a href="{{ route('verify.email') }}" class="dropdown-item"> 
                                        Verify Email
                                    </a>
                                    <hr>                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
