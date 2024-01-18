<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <x-header></x-header>
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>