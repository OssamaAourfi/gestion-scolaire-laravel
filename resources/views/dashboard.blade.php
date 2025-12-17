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
    {{-- PARTIE ABSENCES (Ghir l Student) --}}
            @if(!$isAdmin)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-bold mb-4 text-red-600">Mon Suivi d'Assiduité (Absences)</h3>

                        @if($absences->isEmpty())
                            <p class="text-green-600 font-bold">Bravo! Aucune absence enregistrée.</p>
                        @else
                            <table class="min-w-full">
                                <thead class="bg-red-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-red-500 uppercase">Justification</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($absences as $absence)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($absence->date)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($absence->justifie)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Justifiée (Certificat)
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Non Justifiée ⚠️
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif
            {{-- PARTIE EMPLOI DU TEMPS (Ghir l Student) --}}
            @if(!$isAdmin)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 mb-12">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-blue-600">📅 Mon Emploi du Temps</h3>
                        </div>

                        @if($emplois->isEmpty())
                            <p class="text-gray-500 italic">Aucun emploi du temps disponible pour votre classe.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full border border-gray-200">
                                    <thead class="bg-blue-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase">Jour</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase">Horaire</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase">Matière</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($emplois as $emploi)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-800">
                                                {{ $emploi->jour }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                                <span class="bg-blue-100 text-blue-800 py-1 px-2 rounded text-sm">
                                                    {{ \Carbon\Carbon::parse($emploi->heure_debut)->format('H:i') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($emploi->heure_fin)->format('H:i') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap font-bold text-indigo-600">
                                                {{ $emploi->matiere->nom }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
</x-app-layout>
