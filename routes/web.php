<?php

use App\Models\Note;
use App\Models\User;
use App\Models\Classe;
use App\Models\Emploi;
use App\Models\Absence;
use App\Models\Matiere;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    // 1. ILA KAN ADMIN
    if ($user->role === 'admin') {
        $stats = [
            'students' => User::where('role', 'student')->count(),
            'classes' => Classe::count(),
            'matieres' => Matiere::count(),
        ];
        return view('dashboard', compact('stats'))->with('isAdmin', true);
    }

    // 2. ILA KAN STUDENT (TILMID)
    if ($user->role === 'student') {
        // 1. Njibo noqat
        $notes = Note::where('user_id', $user->id)->with('matiere')->get();

        // 2. Njibo Absences
        $absences = Absence::where('user_id', $user->id)->orderBy('date', 'desc')->get();

        // 3. Njibo Emploi du temps (DYAL CLASS_ID DYALO)
        
        $emplois = Emploi::where('classe_id', $user->class_id)
            ->with('matiere')
            ->orderBy('jour')
            ->orderBy('heure_debut')
            ->get();

        // Nsifto koulchi: notes, absences, emplois
        return view('dashboard', compact('notes', 'absences', 'emplois'))->with('isAdmin', false);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// ROUTES ADMIN (Sécurisé)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('classes', ClasseController::class);
    Route::resource('students', StudentController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('absences', AbsenceController::class);
    Route::resource('emplois', EmploiController::class);
});

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';