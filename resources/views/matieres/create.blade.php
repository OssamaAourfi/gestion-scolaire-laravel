<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Ajouter une Matière</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('matieres.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nom de la Matière</label>
                <input type="text" name="nom" class="border rounded w-full py-2 px-3" placeholder="Ex: Mathématiques">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Coefficient</label>
                <input type="number" name="coefficient" value="1" class="border rounded w-full py-2 px-3">
            </div>
            <button type="submit" class="bg-purple-600 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
        </form>
    </div></div></div>
</x-app-layout>
