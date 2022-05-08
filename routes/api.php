<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GetCompanyEvaluationsController,
    StoreEvaluationController
};

Route::get('/', fn () => response()->json('Comments Service'));

Route::get('/{company}/evaluations', [GetCompanyEvaluationsController::class, 'handle']);
Route::post('/evaluations', [StoreEvaluationController::class, 'handle']);
