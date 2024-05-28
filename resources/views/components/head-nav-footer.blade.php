<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $pageName }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/403eb08f15.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body class="bg-[#DCE0D9]">
    <x-navbar />
    <div class="flex flex-col justify-center">
        {{ $slot }}
    </div>
    <x-footer />
    @livewireScripts
</body>

