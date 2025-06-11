<?php

use App\Livewire\TracerForm;
use App\Livewire\VerifyForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/form/verify', VerifyForm::class)->name('form.verify');

Route::get('/form/tracerstudy', TracerForm::class)->name('form.tracerstudy');