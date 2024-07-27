<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('page-title') | {{ config('app.name') }}</title>
  </head>
  <body class="w-full bg-slate-100">
    {{ $slot }}
    @vite('resources/js/app.js')
  </body>
</html>
