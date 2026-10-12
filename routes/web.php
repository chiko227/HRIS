<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke Employee Directory
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Employee Directory — Tantangan 3
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
