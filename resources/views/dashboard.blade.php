<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $isAdmin ? __('Tableau de Bord Admin') : __('Mon Espace Élève') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- PARTIE ADMIN : STATISTIQUES --}}
            @if($isAdmin)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                        <div class="text-gray-500">Total Classes</div>
                        <div class="text-3xl font-bold">{{ $stats['classes'] }}</div>
                    </div>
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg border-l-4 border-green-500">
                        <div class="text-gray-500">Total Élèves</div>
                        <div class="text-3xl font-bold">{{ $stats['students'] }}</div>
                    </div>
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                        <div class="text-gray-500">Total Matières</div>
                        <div class="text-3xl font-bold">{{ $stats['matieres'] }}</div>
                    </div>
                </div>
            @endif

            {{-- PARTIE ÉLÈVE : MES NOTES --}}
            @if(!$isAdmin)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-bold mb-4">Mes Résultats Scolaires</h3>

                        @if($notes->isEmpty())
                            <p class="text-gray-500">Aucune note disponible pour le moment.</p>
                        @else
                            <table class="min-w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matière</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coefficient</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($notes as $note)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $note->matiere->nom }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $note->matiere->coefficient }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-bold
                                            {{ $note->valeur < 10 ? 'text-red-500' : 'text-green-600' }}">
                                            {{ $note->valeur }}/20
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- HNA NQDRO NZIDO L-MOYENNE (M3qqda chwia walakin zwina) --}}
                            <div class="mt-6 p-4 bg-gray-100 rounded text-right">
                                @php
                                    $totalNotes = 0;
                                    $totalCoeff = 0;
                                    foreach($notes as $n) {
                                        $totalNotes += $n->valeur * $n->matiere->coefficient;
                                        $totalCoeff += $n->matiere->coefficient;
                                    }
                                    $moyenne = $totalCoeff > 0 ? $totalNotes / $totalCoeff : 0;
                                @endphp
                                <span class="text-gray-700 font-bold text-xl">Moyenne Générale: </span>
                                <span class="text-2xl font-black {{ $moyenne < 10 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ number_format($moyenne, 2) }} / 20
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
