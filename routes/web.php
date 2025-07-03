<?php

use App\Livewire\TracerForm;
use App\Livewire\VerifyForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tracerstudy/verification', VerifyForm::class)->name('tracerstudy.verification');

Route::get('/tracerstudy/form', TracerForm::class)->name('tracerstudy.form');