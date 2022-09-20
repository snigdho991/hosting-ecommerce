<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="Description" lang="en" content="{{ config('settings.seo_meta_description') }}">
    {{-- <meta name="keywords" content="meta tags, meta description, meta keywords, SEO, search engine optimization"> --}}
    {{-- <meta name="author" content="ADD AUTHOR INFORMATION"> --}}
    <meta name="robots" content="index, follow">

    <!-- icons -->
    @if (config('settings.site_favicon') != null)
        <link rel="shortcut icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}">
    @else
        <img src="{{ asset('/assets/images/favicon-default.ico') }}">
    @endif

    <!-- Bootstrap Core CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-all.min.css') }}">
    <!-- Slick slider CSS file -->
    <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
    <!-- Override CSS file - add your own CSS rules -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css" />
    <style>
        .itemside {
            position: relative;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            width: 100%;
        }

        .itemside .text-wrap {
            padding-left: 15px;
            padding-right: 7px;
        }

        .text-muted {
            color: #777;
        }

        .mg-b-20 {
            margin-bottom: 20px;
        }

        .mg-t-20 {
            margin-top: 20px;
        }

        .navbar-fixed-top {
          top: 0;
          z-index: 100;
          position: fixed;
          width: 100%;
        }

    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        @if(Auth::check())
            @if (url()->current() != url('/inbox'))
                <div style="display: none !important;"><chat :user="{{ auth()->user() }}"></chat></div>
            @endif
        @endif
        <init></init>
        
        @include('layouts.header')
        
        <!-- Page Content -->
        @yield('content')
        
        @include('layouts.footer')
        {{-- @include('layouts.scripts') --}}
    </div>
    @yield('script')
    @yield('scripts')
    {{-- scripts sources --}}
    <!-- JQuery scripts -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core scripts -->
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/js/paper-full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/metaball.js') }}" data-paper-canvas="infobg"></script>
    <!-- Main scripts -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.js"></script>
    <script>
        @if(Session::has('noty-success')) new Noty({ 
                type:'success', 
                layout:'bottomLeft', 
                text: '{{ Session::get('noty-success') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('noty-info')) new Noty({ 
                type:'info', 
                layout:'bottomLeft', 
                text: '{{ Session::get('noty-info') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('noty-error')) new Noty({ 
                type:'error', 
                layout:'bottomLeft', 
                text: '{{ Session::get('noty-error') }}', 
                timeout: 5000
            }).show(); 
        @endif

        @if(Session::has('noty-warning')) new Noty({ 
                type:'warning', 
                layout:'bottomLeft', 
                text: '{{ Session::get('noty-warning') }}', 
                timeout: 5000
            }).show(); 
        @endif
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>

    <script type="text/javascript">
        var $window = $(window);
        var nav = $('.navbar');
        $window.scroll(function(){
            if ($window.scrollTop() >= 250) {
               nav.addClass('navbar-fixed-top');
            }
            else {
               nav.removeClass('navbar-fixed-top');
            }
        });
    </script>
    
</body>

</html>