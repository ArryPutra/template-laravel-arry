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

<body class="font-inter {{ $class ?? '' }}">

    @yield('content')

</body>

</html>
