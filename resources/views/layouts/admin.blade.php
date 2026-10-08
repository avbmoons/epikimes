<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin') | hobyArts</title>
  {{-- <link rel="stylesheet" href="../../styles/components/layouts/admin/admin.css"> --}}
  @section('styles')
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @show

  @stack('page-scripts')

</head>
<body>
  <div class="wrapper">
    <div class="top">
      <x-admin.header></x-admin.header>
      <main-admin>
        <div class="main-block">
          <x-admin.sidebar></x-admin.sidebar>
          <div class="admin-content"></div>
        </div>
      </main-admin>
    </div>
    <x-admin.footer></x-admin.footer>
  </div>
  @stack('js')
</body>
</html>