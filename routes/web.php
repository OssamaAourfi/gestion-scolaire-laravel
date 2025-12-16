<?php

use App\Models\Note;
use App\Models\User;
use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ClasseController;
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
        // Sift m3ah variable 'isAdmin' = true
        return view('dashboard', compact('stats'))->with('isAdmin', true);
    }

    // 2. ILA KAN STUDENT (TILMID)
    if ($user->role === 'student') {
        // Njibo ghir noqat dyal had tilmid (where user_id = Auth::id())
        $notes = Note::where('user_id', $user->id)->with('matiere')->get();

        // Sift m3ah variable 'isAdmin' = false
        return view('dashboard', compact('notes'))->with('isAdmin', false);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::resource('classes', ClasseController::class);
    Route::resource('students', StudentController::class);
    Route::resource('matieres', MatiereController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('notes', NoteController::class);

require __DIR__.'/auth.php';
