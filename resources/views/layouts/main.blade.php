<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    @include('layouts.components.header_file')
  </head>
  <body>
    @include('layouts.components.svg')
   
    @include('layouts.components.header')
   @yield('main')
    @include('layouts.components.footer_file')
    </body>
</html>
