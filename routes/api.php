<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json('Comments Service'));
