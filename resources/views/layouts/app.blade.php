<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Go-Camps') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .transition-default {
            transition: all 0.3s ease-in-out;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-100 text-gray-800 min-h-screen antialiased">

    <div class="min-h-screen flex flex-col">
        <div class="px-6 py-4">
            <button type="button" onclick="window.history.back()"
                class="px-5 py-2 bg-white text-purple-600 border border-purple-300 hover:bg-purple-100 font-semibold rounded-full shadow transition-default">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </button>
        </div>
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="text-2xl font-semibold text-gray-800">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1 py-8 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
