<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une Classe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf

                        {{-- Nom de la classe --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nom de la classe</label>
                            <input type="text" name="nom" placeholder="Ex: 2ème Année B" class="border rounded w-full py-2 px-3">
                        </div>

                        {{-- Niveau --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Niveau</label>
                            <select name="niveau" class="border rounded w-full py-2 px-3">
                                <option value="Primaire">Primaire</option>
                                <option value="Collège">Collège</option>
                                <option value="Lycée">Lycée</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-blue-500 text-dark font-bold py-2 px-4 rounded">
                            Enregistrer
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
