<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title') | Inspiring our generation since 1996</title>
   <meta name="description" content="@yield('description')">
   <meta name="author" content="oratorio music foundation developers">
   <meta name="keywords" content="@yield('keywords')">
   <link rel="shortcut icon" href="https://oratoriogroup.org/concert_favicon.png">
   <link rel="canonical" href="@yield('canonical')" />

   <meta name="msapplication-TileColor" content="#E70000">
   <meta name="theme-color" content="#E70000">

   <link rel="preload" href="{{ asset('asset/css/icons.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('asset/css/icons.css') }}">
   <link rel="preload" href="{{ asset('asset/css/uikit.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('asset/css/uikit.css') }}">
   <link rel="preload" href="{{ asset('asset/css/connect.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('asset/css/connect.css') }}">
   <link rel="preload" href="{{ asset('asset/dist/tailwind.min.css') }}" as="style">
   <link href="{{ asset('asset/dist/tailwind.min.css') }}" rel="stylesheet">

   <!-- Open Graph / Facebook -->
   <meta property="og:type" content="website">
   <meta property="og:url" content="https://oratoriogroup.org/">
   <meta property="og:title" content="@yield('title')">
   <meta property="og:description" content="@yield('description')">
   <meta property="og:image" content="https://oratoriogroup.org/asset/img/oratorio.png">

   <!-- Twitter -->
   <meta property="twitter:card" content="summary_large_image">
   <meta property="twitter:url" content="https://oratoriogroup.org/">
   <meta property="twitter:title" content="@yield('title')">
   <meta property="twitter:description" content="@yield('description')">
   <meta property="twitter:image" content="https://oratoriogroup.org/asset/img/oratorio.png">
</head>

<body>


   <div id="wrapper">
      @auth
      @include('partials._header')
      @include('partials._sidebar')
      @endauth

      @yield('content')      
   </div>

   <link rel="preload" href="{{ asset('asset/dist/jquery-3.6.0.min.js') }}" as="script" crossorigin="anonymous">
   <script src="{{ asset('asset/dist/jquery-3.6.0.min.js') }}" crossorigin="anonymous"></script>
   <link rel="preload" href="{{ asset('asset/js/tippy.all.min.js') }}" as="script">
   <script src="{{ asset('asset/js/tippy.all.min.js') }}"></script>
   <link rel="preload" href="{{ asset('asset/js/uikit.js') }}" as="script">
   <script src="{{ asset('asset/js/uikit.js') }}"></script>
   <link rel="preload" href="{{ asset('asset/js/simplebar.js') }}" as="script">
   <script src="{{ asset('asset/js/simplebar.js') }}"></script>
   <link rel="preload" href="{{ asset('asset/js/custom.js') }}" as="script">
   <script src="{{ asset('asset/js/custom.js') }}"></script>
   <link rel="preload" href="{{ asset('asset/js/bootstrap-select.min.js') }}" as="script">
   <script src="{{ asset('asset/js/bootstrap-select.min.js') }}"></script> 
   <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons.js"></script>



</body>

</html>