<?php

use App\Enums\SignatureStatus;
use App\Http\Controllers\ProfileController;
use App\Models\Client;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/test', function() {
    // dd(Auth::user());
    $plan = Plan::create([
        'name'              =>  'Last Plan',
        'short_description' =>  'A terrible plan',
        'price'             =>  2990
    ]);

    $client = Auth::user()->client()->create([
        'document'  =>  '02907039130',
        'birthdate' =>  '1992-07-20'
    ]);

    // $client = Client::create([
    //     'document'  =>  '02907039130',
    //     'birthdate' =>  '1992-07-20',
    //     'user_id'   =>  Auth::user()->id
    // ]);

    $client->signatures()->create([
        'plan_id'   =>  $plan->id,
        'status'    =>  SignatureStatus::ACTIVATED
    ]);

    return 'hey_client';
});