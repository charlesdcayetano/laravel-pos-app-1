<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Material Symbols --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href={{ asset('css/styles.css') }}>
    @livewireStyles

    {{-- Vite --}}
    {{-- @vite(['public/css/bootstrap.min.css', 'public/css/styles.css', 'public/js/bootstrap.bundle.min.js', 'public/js/script.js']) --}}
</head>

<body>
    {{-- Site  Wrapper --}}
    <div class="wrapper">
        @include('includes.sidebar')

        {{-- Content Wrapper. Contains page content --}}
        <div class="main">
            @include('includes.navbar')

            {{-- Main content --}}
            <main class="content px-3 py-2">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h4>@yield('content-header')</h4>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
        {{-- /.content-wrapper --}}

        {{-- Control Sidebar --}}
        <aside class="control-sidebar control-sidebar-dark">
            {{-- Control sidebar content goes here --}}
        </aside>
    </div>
    {{-- ./wrapper --}}

    {{-- Scripts --}}
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    @livewireScripts
</body>

</html>
