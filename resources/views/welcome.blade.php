<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMPN 2 Kunjang Site</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminLTE-3.2.0')}}/plugins/summernote/summernote-bs4.min.css">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}
            body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}
            *,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}
            .bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}
            .hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}
            .ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}
            .text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}
            .text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}
            .sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark)
            {.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}
            .dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
            #map {
          height: 400px;
        }
            body {
                font-family: 'Nunito', sans-serif;  
            }
            p{
                font-family: 'Poppins', sans-serif;
                color:#008B8B;
                letter-spacing: 3px;
                
		}
 
            .background-image {
                width:400px;
            }
            .button4 {
                width: 510px;
                height: 35px;
                border-radius: 13px;
            } 
            .btn {
                background-color: #008B8B;
                color: #FFFFFF;
                
                        }
        </style>
    </head>
    <body class="antialiased">
    <div class="container-fluid text-center">
  <div class="row">
    <div class="col" style="">
      <div class="p-5 bg-transparent" >
     <!-- <i class='fas fa-desktop' style='font-size:36px'></i> -->
     <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logoku.png" height="105" width="295" alt="g2" style="margin-left: 40px;" align="left"> &nbsp;
     <br><br><br><br><br><br><br><br><br>
     <b><p class='text-left' style='font-size:30px; color="green";'>Selamat Datang,</p></b>
     <b><p class='text-left' style='font-size:35px '>di SMP NEGERI 2 KUNJANG</p></b>
     <b><p class='text-left' style='font-size:35px '>BEASISWA SYSTEM</p></b>
     <br>  
     <b><p class='text-left' style='font-size:38px '>
     @if (Route::has('login'))
                    @auth
                        <p><a href="{{ url('/home') }}" class="text-sm text-white-700 dark:text-white-500 underline me-2">Home</a></p>
                    @else
                    <p><a href="{{ route('auth.login') }}" class="btn btn-block text-sm text-white-200 dark:text-white-500 d-grid col-12 button4">Get Started</i></a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                    @endauth
                    @endif
    </p></b>

    </p>
    </div>
    </div>
    <div class="col" style="" >
    <!-- <div class="col" style="background-image: url('{{asset('AdminLTE-3.2.0')}}/dist/img/hm4.png'); background-repeat: no-repeat;"  width="200"> -->
    <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logo4.png" height="80" width="90" alt="logo4" align="right" style="margin-top: 40px; margin-right: 70px; margin-bottom: -80px;"> &nbsp;

      <div class="p-5 bg-transparent" style="margin-bottom: 100px;">
      <!-- margin-right: 80px; background-image: url('{{asset('AdminLTE-3.2.0')}}/dist/img/ok.png'); -->
     <!-- <i class='fas fa-desktop' style='font-size:36px'></i> -->
     <p><img src="{{asset('AdminLTE-3.2.0')}}/dist/img/image_sekolah.png" height="500" width="600" alt="image_sekolah" style="" align="right"> </p>
    <br>  
    <br>  
    <br>  
    <!-- <p class='text-justify bg-transparent text-dark'>Sebagai Penunjang dalam Keputusan Seleksi Beasiswa SMP Negeri 2 Kunjang. Sistem Menghasilkan Efisiensi dan Keakuratan Data. 
        
    <br>
                    @if (Route::has('login'))
                    @auth
                        <p><a href="{{ url('/home') }}" class="text-sm text-white-700 dark:text-white-500 underline me-2">Home</a></p>
                    @else
                    <p><a href="{{ route('auth.login') }}" class="btn btn-info text-sm text-white-200 dark:text-white-500 d-grid col-4 button4">LOGIN</i></a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p></div>

                    @endauth
                    @endif
                    </center>
                    </p> -->
    </div>
  </div>
</div>
        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-2 sm:pt-0">  -->
                <!-- <div class="hidden fixed bottom-0 right-0 px-10 py-10 sm:block fixed-top" >
                    
                <ul class="nav justify-content-end nav nav-tabs p-2 mb-2  text-white"> -->
                <!-- <div class="container-fluid"> -->
                <!-- <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logo3.png" height="60" width="85" alt="logo3" class="brand-image img-circle" style="padding-left: 30px;"> &nbsp;
     <span class="brand-text" href="#" style="line-height:55px; font-size:18px;">SIPESAN BEASISWA</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                <!-- <a href="{{ asset('')}}" class="brand-link">
                <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logo3.png" alt="logo3" class="brand-image img-circle elevation-4" style="opacity: .8" align="left"> -->
                <!-- <span class="brand-text font-weight-light "><p style="font-size:16px;">SIPESAN BEASISWA</p><center><p style="font-size:16px;"></p></center></span> -->
                <!-- </a> -->

            <!-- <div class="max-w-6xl mx-auto sm:px-2 lg:px-8">

            <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
            <a href="index.html" class="logo"><img alt="" class="img-fluid"></a>
            </div>
                <div class="mt-0 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="container text-center">
  <div class="row">
</div> -->
                    <!-- <div class="grid grid-cols-1 md:grid-cols-0">
                        <div class="p-0">
                            <div class="flex items-center"> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div> -->
                            <!-- </div> -->
                        <!-- <center>
                        <div class="p-0 border-t border-gray-0 dark:border-gray-0 md:border-t-0 md:border-l">
                            <div class="flex items-center"> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500"><path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" /></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div> -->
                            <!-- </div>
                            <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logoku.png" height="270" width="500" alt="logo3" class="" style="padding-left: 2px;"> &nbsp;
                                <b><span class="brand-text" href="#" style="line-height:55px; font-size:35px;">SIPESAN BEASISWA</span><b>
                        </div>
                        
                        </center>
                        </div>
<br> -->
                    <!-- <center>
                    @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-white-700 dark:text-white-500 underline me-2">Home</a>
                    @else
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{ route('auth.login') }}" class="btn btn-info btn-block text-sm text-white-700 dark:text-white-500 ">SIGN IN . . . <i class='fas fa-share-square'></i></a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div> -->
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('auth.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"> <i class="fa fa-user-plus"> Register </i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endif -->
                    <!-- @endauth -->
                    <!-- <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{route('pesdik.create')}}"> <i class='fas fa-file-upload'> Pendaftaran</i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    <!-- @endif
                    </center> -->

                        <!-- <div class="p-0 border-t border-gray-0 dark:border-gray-0 md:border-t-0 md:border-l">

                        </div>
<div class="p-3 border-t border-gray-200 dark:border-gray-700 p-3 bg-dark text-white sm:items-center">
<div class="container px-4 text-center" >
  <div class="row gx-5">
    <div class="col">
     <div class="p-0 border bg-cyan"> -->
     <!-- <i class='fas fa-desktop' style='font-size:36px'></i> -->
     <!-- <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/g2.jpg" height="150" width="280" alt="g2" style=""> &nbsp;

     <br>Ekstrakulikuler
    </div>
    </div>
    <div class="col">
     <div class="p-0 border bg-cyan"> -->
     <!-- <i class='fas fa-desktop' style='font-size:36px'></i> -->
     <!-- <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/g3.jpg" height="150" width="280" alt="g3" style=""> &nbsp;

     <br>Halaman SMPN 2 Kunjang
    </div>
    </div>
    <div class="col">
      <div class="p-0 border bg-cyan" > -->
      <!-- <i class='fas fa-atom' style='font-size:36px'></i> -->
      <!-- <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/g1.jpg" height="150" width="280" alt="g1" style=""> &nbsp;
      <br>Kegiatan Tengah Semester</div>
    </div>
  </div>
</div> 
<br>
<div class="flex items-center">
<div class="p-2 mb-2 bg-body rounded">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->

                        <!-- <i class='far fa-building'> <b> Jl Raya Kunjang - Badas No 263, Desa Kuwik Kec. Kunjang Kab. Kediri</b> </i>
                        &nbsp;&nbsp;&nbsp;
                        <i class='fas fa-users'> <a href="http://www.smpn2kunjangkabkediri.sch.id"> http://www.smpn2kunjangkabkediri.sch.id </a></i>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <i class='fas fa-phone-alt'> (0354) 393127</i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <i class='fas fa-envelope-open-text'> <a href="info@smpn2kunjangkabkediri.sch.id"> info@smpn2kunjangkabkediri.sch.id </a></i>
                        </div>        
                        </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>
                 -->

                <!-- <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div> -->
        </div>
        
    </body>

    
</html>
