<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Arabic font -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- English font -->
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <style>
        /* Default font for English */
        .font-en body {
            font-family: "Red Hat Display", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        /* Arabic font */
        .font-ar body {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-style: normal;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-brand-sky-level-900" {{ app()->getLocale() == 'ar' ? 'font-ar' : 'font-en' }}">
@include('components.partials.header')
{{ $slot }}

@livewire('notifications')
@include('components.partials.footer')
@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
