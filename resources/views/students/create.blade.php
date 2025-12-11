<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ajouter un Élève</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    {{-- Nom --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nom Complet</label>
                        <input type="text" name="name" class="border rounded w-full py-2 px-3">
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="name" name="email" class="border rounded w-full py-2 px-3">
                    </div>

                    {{-- LE CHOIX DE LA CLASSE (Relation) --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Classe</label>
                        <select name="class_id" class="border rounded w-full py-2 px-3">
                            <option value="">-- Choisir une classe --</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-green-600 text-green font-bold py-2 px-4 rounded">
                        Ajouter l'élève
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
