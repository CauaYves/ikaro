<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Studio de Lutas Ikaro Graciano</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js')  }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/baguetteBox.js') }}"></script>

    <script>
        window.addEventListener('load', function() {
            baguetteBox.run('.gallery');
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/baguetteBox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            @include('layouts.componentes.site.navbar')
            @include('layouts.componentes.site.carousel')
        </header>
        <main class="py-4">
            @yield('content')
        </main>
            @include('layouts.componentes.site.footer')
    </div>
</body>
</html>
