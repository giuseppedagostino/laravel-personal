<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- titolo --}}
    <title>Laravel personal</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    @include('components.header')

    <main>
      @yield('main')
    </main>

    @include('components.footer')
  </body>
</html>