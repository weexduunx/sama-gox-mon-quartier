<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sama Gox - Mon Quartier</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="//unpkg.com/alpinejs" defer></script>
        
        @vite('resources/css/app.css', 'resources/js/app.js')
        <!-- Styles -->
  
    </head>

    <body class="bg-gradient-to-br from-gray-50 via-white to-green-50 min-h-screen">
        <livewire:resident.home />
    </body>
</html>
