<?php

use App\Http\Controllers\EmployeeAddressController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/test', [SignatureController::class, 'index']);

Route::resource('funcionarios', EmployeeController::class)
    ->parameter('funcionarios','employee_id')
    ->except('destroy');

Route::resource('funcionarios.enderecos', EmployeeAddressController::class)
    ->parameters([
        'funcionarios'  =>  'employee_id',
        'enderecos'     =>  'address_id'
    ])
    ->only(['index', 'show']);