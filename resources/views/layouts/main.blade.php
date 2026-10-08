<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | hobbyArts</title>
  {{-- <link rel="stylesheet" href="../../styles/components/layouts/main/main.css"> --}}
  @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @show

  @stack('page-scripts')

</head>
<body>
  <div class="wrapper">
    <div class="top" id="top">
      <x-header></x-header>
      <main>
        @yield('content')
      </main>
    </div>
    <x-footer></x-footer>
  </div> 
  @stack('js')
</body>
</html>