<?php

use App\Livewire\TracerForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/form/tracerstudy', TracerForm::class)->name('form.tracerstudy');