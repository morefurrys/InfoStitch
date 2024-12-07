<?php

use App\Filament\Resources\CustomerResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/customers',[CustomerController::class,'index'])->name('customer.index');
// Route::get('/customers/create',[CustomerController::class,'create'])->name('customer.create');
// Route::post('/customers',[CustomerController::class,'store'])->name('customer.store');
// Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('customer.edit');
// Route::put('/customers/{customer}/update',[CustomerController::class,'update'])->name('customer.update');
// Route::delete('/customers/{customer}/destroy',[CustomerController::class,'destroy'])->name('customer.destroy');