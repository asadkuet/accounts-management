<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
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
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /* Accounts */
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts');
    Route::get('/account/create', [AccountController::class, 'create'])->name('createAccount');
    Route::post('/account/create', [AccountController::class, 'store'])->name('storeAccount');
    
    /* transaction */
    // Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');    
    Route::get('/transaction/send', [TransactionController::class, 'createSend'])->name('createSendMoney');
    Route::post('/transaction/send', [TransactionController::class, 'send'])->name('sendMoney');

    Route::get('/transaction/receive', [TransactionController::class, 'createReceive'])->name('createReceiveMoney');
    Route::post('/transaction/receive', [TransactionController::class, 'receive'])->name('receiveMoney');

});

require __DIR__.'/auth.php';
