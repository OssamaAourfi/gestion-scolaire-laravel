<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Liste des Matières</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('matieres.create') }}" class="bg-purple-600 text-white font-bold py-2 px-4 rounded">+ Nouvelle Matière</a>
        </div>
        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 border-b">
                    <tr><th class="px-6 py-3 text-left">Nom</th><th class="px-6 py-3 text-left">Coefficient</th></tr>
                </thead>
                <tbody>
                    @foreach($matieres as $matiere)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $matiere->nom }}</td>
                        <td class="px-6 py-4">{{ $matiere->coefficient }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div></div>
</x-app-layout>
