<?php

use App\Livewire\QuotePage;
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
\Illuminate\Support\Facades\Auth::loginUsingId(1);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/{quote:content}', QuotePage::class)->name('quote');
