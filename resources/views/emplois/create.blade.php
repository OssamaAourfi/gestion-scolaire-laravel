<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Séance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('emplois.store') }}" method="POST">
                        @csrf

                        {{-- Classe --}}
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Classe</label>
                            <select name="classe_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Matière --}}
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Matière</label>
                            <select name="matiere_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jour --}}
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jour</label>
                            <select name="jour" class="w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($jours as $jour)
                                    <option value="{{ $jour }}">{{ $jour }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Heure --}}
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block font-bold mb-2">Heure Début</label>
                                <input type="time" name="heure_debut" class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block font-bold mb-2">Heure Fin</label>
                                <input type="time" name="heure_fin" class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Enregistrer la Séance
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
