<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $pageName }}</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/403eb08f15.js" crossorigin="anonymous"></script>
    @livewireStyles
    <!-- Include the bundled JavaScript file -->
    @vite('resources/js/app.js')
</head>
<body class="bg-[#DCE0D9] text-gray-800">
<x-navbar />
<div class="flex flex-col justify-center relative">
    {{ $slot }}
</div>
<x-footer />
@livewireScripts
</body>
</html>
