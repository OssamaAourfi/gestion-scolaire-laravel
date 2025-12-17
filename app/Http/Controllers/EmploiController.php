<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Emploi;
use App\Models\Matiere;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplois = Emploi::with(['classe', 'matiere'])->orderBy('classe_id')->get();
        return view('emplois.index', compact('emplois'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();
        $matieres = Matiere::all();
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

        return view('emplois.create', compact('classes', 'matieres', 'jours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'classe_id' => 'required',
            'matiere_id' => 'required',
            'jour' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
        ]);

        Emploi::create($request->all());

        return redirect()->route('emplois.index')->with('success', 'Séance ajoutée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return redirect()->route('emplois.index')->with('success', 'Séance supprimée');
    }
}
