<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Matiere;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::with(['student', 'matiere'])->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::where('role', 'student')->get();
        $matieres = Matiere::all();

        return view('notes.create', compact('students', 'matieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'matiere_id' => 'required|exists:matieres,id',
            'valeur' => 'required|numeric|min:0|max:20', 
        ]);

        Note::create($request->all());

        return redirect()->route('notes.index')->with('success', 'Note ajoutée!');
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
    public function destroy(string $id)
    {
        //
    }
}
