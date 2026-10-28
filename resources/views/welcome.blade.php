<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Aset Bootstrap (hasil "npm run dev" / "npm run build") --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif
</head>

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 100vh;">
        <h1 class="display-5">{{ config('app.name', 'Laravel') }}</h1>
        <p class="text-muted">Pemrograman Web II &ndash; Laravel dengan Database</p>

        <div>
            @auth
                <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                <a href="{{ url('dokter') }}" class="btn btn-outline-primary">Data Dokter</a>
            @else
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                @endif
            @endauth
        </div>
    </div>
</body>

</html>
