<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voxy Club Indonesia {{ $title ?? config('app.name') }}</title>

    <!-- Default Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Voxy Club Indonesia {{ $title ?? config('app.name') }}">
    <meta property="og:description" content="{{ $description ?? 'Platform event terlengkap di Indonesia' }}">
    <meta property="og:image" content="{{ $image ?? asset('images/og-default.jpg') }}">

    <!-- Default Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $description ?? 'Platform event terlengkap di Indonesia' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/og-default.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">


    @vite('resources/css/app.css')
    @livewireStyles

</head>

<body class="bg-gradient-to-br from-slate-50 to-sky-100 font-[Inter,sans-serif]">

    <x-frontend.navbar.nav />


    {{ $slot }}

    <!-- Image Modal (global) -->
    {{-- <x-ui.modal-image /> --}}

    <x-frontend.footer />

    @livewireScripts
    @stack('scripts')
</body>

</html>
