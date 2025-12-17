<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Suivi des Absences</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-4">
            <a href="{{ route('absences.create') }}" class="bg-red-500 text-white font-bold py-2 px-4 rounded">+ Nouvelle Absence</a>
        </div>
        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 border-b">
                    <tr><th class="px-6 py-3 text-left">Élève</th><th class="px-6 py-3 text-left">Date</th><th class="px-6 py-3 text-left">État</th></tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $absence->student->name }}</td>
                        <td class="px-6 py-4">{{ $absence->date }}</td>
                        <td class="px-6 py-4">
                            @if($absence->justifie)
                                <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Justifiée</span>
                            @else
                                <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-xs">Non Justifiée</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div></div>
</x-app-layout>
