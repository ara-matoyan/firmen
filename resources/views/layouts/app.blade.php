<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- SEO meta and images -->
    <meta name="copyright"   content="Copyright 2019 by MIQR, All Rights Reserved, V 1.0.0" >
    <meta name="author"      content="Ara Matoyan" >
    <meta name="Keywords"    content="Ara Matoyan" >
    <meta name="description" content="Ara Matoyan">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta property="og:image"   content="{{url('/img/favicon.png')}}">
    <link rel="shortcut icon" href="{{url('/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('/img/favicon.png')}}" type="image/png">
    <link rel="apple-touch-icon" href="{{url('/img/apple-touch-icon.png')}}">

     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="{{url('/jquery/bootstrap.min.css')}}" >

     <!-- font awesome helper -->
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

     <!-- font-awesome -->
     <link rel="stylesheet" href="{{ url('/required/font-awesome.min.css') }}" >

     {{-- multi select drop down menu --}}
     <link rel="stylesheet" href="{{ url('/required/bootstrap-select.min.css') }}">

     <!-- Custom css-->
     <link rel="stylesheet" href="{{ url('/css/custom.css')}}" >

     <!-- dataTables css -->   
     <link rel="stylesheet" href="{{ url('/jquery/dataTables.min.css') }}" >
     <link rel="stylesheet" href="{{url('/jquery/buttons.dataTables.min.css') }}" >
     <link rel="stylesheet" href="{{url('/jquery/responsive.dataTables.min.css') }}" >
     <link rel="stylesheet" href="{{url('/jquery/colReorder.dataTables.min.css') }}" >
     
     <!-- select2 --> 
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

	
</head>
<body>
<div class="se-pre-con"></div>

    @if(Auth::check())
        <nav class="navbar navbar-white">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                        <div class="row" >
                            <div class="col-md-6">
                                    <img src="{{url('/img/logo.png')}}"  width="334" height="32.156"/>
                            </div>
                            <div class="col-md-6 mobile"></div>
                        </div>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{Auth::user()->name}}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">                               
                                <li class="profile font-weight-bold"><a href="{{url('/user-update')}}">Benutzerprofil</a></li>
                                <li class="divider"></li>
								<li class="tower"><a href="{{url('/praktikum/create')}}">Neue hinzufügen</a></li>
                                <li class="divider"></li>
                                <li class="tower"><a href="{{url('/options')}}">Optionen</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Abmelden
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    <br><br><br><br>
	@endif


    

    @yield('content')

    <div class="container-fluid main-container ">
        <footer class="footer navbar-default navbar-static-bottom navbar-fixed-bottom">
            <div class="col-md-12 text-center">
            Copyright &COPY; by 2019 <a target="_blank" href=#>MIQR</a>, All Rights Reserved
            </div>
			<br>
        </footer>
    </div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

     <script src="{{url('/jquery/jquery.min.js')}}"></script>

     <!-- Latest compiled and minified JavaScript -->

     <script src="{{url('/jquery/bootstrap.min.js')}}"></script>

    <!-- select 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

     <!--  * Modernizr v2.8.2  -->
     <script src="{{url('jquery/modernizr.js')}}"></script>

     <!-- Include the plugin's CSS and JS: -->
     <script src="{{url('/required/bootstrap-select.min.js') }}"></script>
     <script src="{{url('/required/bootstrap.bundle.min.js')}}"></script>
     <script src="{{url('/jquery/all.js')}}"></script>
     <script src="{{url('/jquery/bootstrap.bundle.min.js') }}"></script> 
     <script src="{{url('/jquery/dataTables.min.js')}}"></script> 
     <script src="{{url('/jquery/dataTables.responsive.min.js')}}"></script>
     <script src="{{url('/jquery/dataTables.colReorder.min.js')}}"></script>
     <script src="{{url('/jquery/dataTables.bootstrap.min.js')}}"></script>
     <script src="{{url('/jquery/dataTables.buttons.min.js')}}"></script>
     <script src="{{url('/jquery/buttons.colVis.min.js')}}"></script> 
     <script src="{{url('/jquery/buttons.print.min.js')}}"></script>


 
     
     <script>
             $(function () {
                  $('.selectpicker').selectpicker();
             });
     </script>

    <script>	
        // Animate loader off screen
        $(window).load(function() {		
            $(".se-pre-con").fadeOut();
        });
    </script>



    @yield('foot')
	
</body>
</html>
