<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de l\'Emploi du Temps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Bouton Ajouter --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('emplois.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                    + Ajouter une Séance
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th class="px-6 py-4">Classe</th>
                                <th class="px-6 py-4">Jour</th>
                                <th class="px-6 py-4">Horaire</th>
                                <th class="px-6 py-4">Matière</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emplois as $emploi)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4 font-bold">{{ $emploi->classe->nom }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $emploi->jour }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ \Carbon\Carbon::parse($emploi->heure_debut)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($emploi->heure_fin)->format('H:i') }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $emploi->matiere->nom }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <form action="{{ route('emplois.destroy', $emploi->id) }}" method="POST" onsubmit="return confirm('Supprimer cette séance ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
