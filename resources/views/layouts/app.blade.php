<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'DÁRI-TAP')</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="{{ asset('medicine-cards.css') }}">
  @stack('styles')
</head>

<body>
  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')

  <script src="{{ asset('script.js') }}"></script>
  @stack('scripts')
  <script src="{{ asset('scriptSearch.js') }}"></script>
</body>
</html>
