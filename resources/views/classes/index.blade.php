<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des Classes</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Bouton Ajouter --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('classes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    + Nouvelle Classe
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Nom</th>
                            <th class="py-2">Niveau</th>
                            <th class="py-2">Nombre d'élèves</th> {{-- HNA FIN GHATBAN L-QOWWA DYAL RELATIONS --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $classe)
                        <tr class="border-b">
                            <td class="py-2 font-bold">{{ $classe->nom }}</td>
                            <td class="py-2">{{ $classe->niveau }}</td>
                            <td class="py-2 text-blue-600">
                                {{ $classe->students->count() }} Élèves  {{-- Chouf chhal sahla! --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
