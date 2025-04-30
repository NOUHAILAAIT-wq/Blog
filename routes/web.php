<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassementTarifaireController;

Route::get('/classement_tarifaire/search', [ClassementTarifaireController::class, 'search'])->name('classement_tarifaire.search');


Route::get('/classement_tarifaire/{id}/edit', [ClassementTarifaireController::class, 'edit'])->name('classement_tarifaire.edit');
Route::put('/classement_tarifaire/{id}', [ClassementTarifaireController::class, 'update'])->name('classement_tarifaire.update');


Route::delete('/classement_tarifaire/{id}', [ClassementTarifaireController::class, 'destroy'])->name('classement_tarifaire.destroy');


Route::get('/classement_tarifaire/{id}/copy', [ClassementTarifaireController::class, 'copy'])->name('classement_tarifaire.copy');
Route::get('/classement_tarifaire', [ClassementTarifaireController::class, 'search'])->name('classement_tarifaire.index');


Route::get('/classement_tarifaire/search', [ClassementTarifaireController::class, 'search'])->name('classement_tarifaire.search');



// Copier une circulaire
Route::get('/classement_tarifaire/{id}/copy', [ClassementTarifaireController::class, 'copy'])->name('classement_tarifaire.copy');
