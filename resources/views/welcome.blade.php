{{-- @extends('layout.app')

@section('content')
    <form action="/logout" method="get">
        @csrf
        @if (auth()->check())
            <h1>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
        @endif
        <button type="submit">Logout</button>
    </form>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['public/css/bootstrap.min.css', 'public/js/bootstrap.bundle.min.js'])
</head>

<body>
    {{-- <div class="wrapper"> --}}
    @include('includes.sidebar')
    <main class="main-content">
        @auth
            <h1 style="color: red;">Hello</h1>
            <h2>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
        @endauth

        @guest
            <h1>Welcome</h1>
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        @endguest
    </main>
    {{-- </div> --}}

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-family: system-ui;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-size: 1.25rem;
            color: white;
            display: grid;
            grid-template-columns: 20rem 1fr;
            gap: 2rem;
        }

    </style>
</body>

</html>
