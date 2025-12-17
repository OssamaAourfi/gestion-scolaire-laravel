<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex bg-white">

            <div class="hidden lg:block lg:w-1/2 bg-cover bg-center relative"
                 style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop');">

                {{-- Overlay Noir (bach tban lktba) --}}
                <div class="absolute inset-0 bg-black opacity-40"></div>

                {{-- Texte f wejht l-image --}}
                <div class="absolute inset-0 flex flex-col justify-center items-center text-white p-12 text-center z-10">
                    <h1 class="text-4xl font-bold mb-4">Système de Gestion Scolaire</h1>
                    <p class="text-lg">Gérez vos classes, élèves et notes en toute simplicité.</p>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-gray-50">
                <div class="w-full max-w-md">

                    {{-- Logo --}}
                    <div class="flex justify-center mb-6">
                        <a href="/">
                            {{-- Hna nqdro ndiro Logo dyal bssh --}}
                            <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </a>
                    </div>

                    {{-- Formulaire (Login/Register kayjiw hna automatic) --}}
                    <div class="bg-white p-8 shadow-2xl rounded-lg border-t-4 border-indigo-600">
                        {{ $slot }}
                    </div>

                    <p class="mt-4 text-center text-sm text-gray-500">
                        &copy; {{ date('Y') }} Gestion Scolaire. Tous droits réservés.
                    </p>
                </div>
            </div>

        </div>
    </body>
</html>
