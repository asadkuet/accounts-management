<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
    // return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    /* Accounts */
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
    Route::get('/account/create/{owner_type}', [AccountController::class, 'create'])->name('createAccount');
    Route::post('/account/create', [AccountController::class, 'store'])->name('storeAccount');

    /* Persons */
    Route::get('/persons', [PersonController::class, 'index'])->name('persons');
    Route::get('/person/create', [PersonController::class, 'create'])->name('createPerson');
    Route::post('/person/create', [PersonController::class, 'store'])->name('storePerson');
    
    /* transaction */
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');    
    Route::get('/transaction/send', [TransactionController::class, 'createSend'])->name('createSendMoney');
    Route::get('/transaction/receive', [TransactionController::class, 'createReceive'])->name('createReceiveMoney');
    
    Route::post('/transaction/storeTransaction', [TransactionController::class, 'storeTransaction'])->name('storeTransaction');
    Route::post('/transaction/storeTransaction', [TransactionController::class, 'storeTransaction'])->name('storeTransaction');
});

require __DIR__.'/auth.php';
