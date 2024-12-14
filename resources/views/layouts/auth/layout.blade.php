<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ null }}" type="image/x-icon">
    <title>{{ $title }} | Website Name</title>
    {{-- IMPORT TAILWIND % ALPINE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- IMPORT BOX ICONS --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js" defer></script>
    @stack('head')
</head>

<style>
    [x-cloak] {
        display: none;
    }
</style>

<body class="font-inter bg-slate-100">

    @include('layouts.auth.header')

    <div class="pl-64 pt-24 p-8 max-md:p-0">
        <div class="md:hidden">
            <div class="h-20"></div>
            <h1 class="font-bold text-3xl max-md:pl-4 max-md:pt-4">{{ $title }}</h1>
        </div>

        <main class="max-md:mt-6 bg-white p-4 md:rounded-lg {{ $class ?? '' }}">
            @yield('content')
        </main>
    </div>

</body>

</html>
