<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

     {{-- Material Symbols --}}
     <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

     {{-- Styles --}}
     <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href={{ asset('css/styles.css') }}>
</head>
<body>
    @yield('content')

    {{-- Scripts --}}
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>