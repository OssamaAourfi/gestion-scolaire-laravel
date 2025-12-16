<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Grid dyal 3 l-Cartes --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                {{-- Carte 1: Classes --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500">Total Classes</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['classes'] }}</div>
                </div>

                {{-- Carte 2: Élèves --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500">Total Élèves</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['students'] }}</div>
                </div>

                {{-- Carte 3: Matières --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                    <div class="text-gray-500">Total Matières</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['matieres'] }}</div>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenue, <strong>{{ Auth::user()->name }}</strong> ! C'est ici que tout se passe.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
