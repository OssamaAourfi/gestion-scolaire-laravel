<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Liste des Notes</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('notes.create') }}" class="bg-indigo-600 text-black font-bold py-2 px-4 rounded">+ Nouvelle Note</a>
        </div>
        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left">Élève</th>
                        <th class="px-6 py-3 text-left">Matière</th>
                        <th class="px-6 py-3 text-left">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notes as $note)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $note->student->name }}</td>
                        <td class="px-6 py-4">{{ $note->matiere->nom }}</td>
                        <td class="px-6 py-4 font-bold
                            {{ $note->valeur < 10 ? 'text-red-500' : 'text-green-600' }}">
                            {{ $note->valeur }}/20
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div></div>
</x-app-layout>
