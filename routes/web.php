<?php

use App\Http\Controllers\{
    ProfileController, 
    PatientsController,
    MedicationsPatientController,
    FlowMedicationsController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return redirect('dashboard');
    })->name('profile.edit');;
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/patients', [PatientsController::class, 'index']);
    Route::get('/patient/{id}/medications', [PatientsController::class, 'medications']);
    Route::get('/add-medication-patient/{id}', [PatientsController::class, 'formAddMedication']);
    Route::post('/save-medication-patient', [MedicationsPatientController::class, 'store']);
    Route::get('/flow-medication-patient/{id}', [MedicationsPatientController::class, 'formAddFlow']);
    Route::post('/save-flow-medication', [FlowMedicationsController::class, 'store']);
    Route::get('/history-flow-medicament/{id}', [FlowMedicationsController::class, 'history']);
    Route::get('/form-patient', [PatientsController::class, 'form']);
    Route::post('/save-patient', [PatientsController::class, 'store']);
    Route::get('/patient/{id}/edit', [PatientsController::class, 'edit']);
    Route::post('/update-patient', [PatientsController::class, 'update']);
    Route::delete('/patient/delete', [PatientsController::class, 'destroy']);
    
});

require __DIR__.'/auth.php';
