<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Ajouter une Note</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">

        <form action="{{ route('notes.store') }}" method="POST">
            @csrf

            {{-- Choisir Élève --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Élève</label>
                <select name="user_id" class="border rounded w-full py-2 px-3">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->classe->nom ?? '?' }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Choisir Matière --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Matière</label>
                <select name="matiere_id" class="border rounded w-full py-2 px-3">
                    @foreach($matieres as $matiere)
                        <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Note --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Note (/20)</label>
                <input type="number" step="0.5" name="valeur" class="border rounded w-full py-2 px-3" min="0" max="20">
            </div>

            <button type="submit" class="bg-indigo-600 text-black font-bold py-2 px-4 rounded">Enregistrer</button>
        </form>

    </div></div></div>
</x-app-layout>
