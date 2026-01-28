<?php

use A17\Twill\Facades\TwillRoutes;
use App\Http\Controllers\Twill\ContactsController;
use Illuminate\Support\Facades\Route;

// Register Twill routes here eg.
// TwillRoutes::module('posts');

TwillRoutes::module('products');

Route::get('/contacts', [ContactsController::class, 'index'])->name('admin.contacts.index');
Route::get('/contacts/{id}', [ContactsController::class, 'show'])->name('admin.contacts.show');
Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->name('admin.contacts.destroy');
