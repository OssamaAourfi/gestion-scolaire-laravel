<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Saisir une Absence</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <form action="{{ route('absences.store') }}" method="POST">
            @csrf

            {{-- Élève --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Élève Absent</label>
                <select name="user_id" class="border rounded w-full py-2 px-3">
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Date --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Date d'absence</label>
                <input type="date" name="date" class="border rounded w-full py-2 px-3">
            </div>

            {{-- Justifié ? --}}
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="justifie" class="form-checkbox h-5 w-5 text-indigo-600">
                    <span class="ml-2 text-gray-700">Absence Justifiée ? (Certificat médical)</span>
                </label>
            </div>

            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">Marquer Absent</button>
        </form>
    </div></div></div>
</x-app-layout>
