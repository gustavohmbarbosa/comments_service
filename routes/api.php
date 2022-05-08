<?php

use App\Http\Controllers\GetCompanyEvaluationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json('Comments Service'));

Route::get('/{company}/evaluations', [GetCompanyEvaluationsController::class, 'handle']);
