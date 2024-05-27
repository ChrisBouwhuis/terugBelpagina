<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $pageName }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />
    {{ $slot }}
    <x-footer />
</body>

