<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
 	@include ('backend.partials.css')
  </head>
   <body class="app sidebar-mini rtl">
        @include ('backend.partials.header')
        <!-- Navbar-->
        @include ('backend.partials.sidebar')
        <main class="app-content">
            @yield('content')

        </main>

        @include ('backend.partials.js.script')
        @yield('script');
    </body>
</html>
