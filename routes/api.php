<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicineApiController;

Route::get('/medicines', [MedicineApiController::class, 'index']);
