<?php

use App\Http\Controllers\Api\v1\TravelPlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->name('api.v1.')->group(function(){

    Route::controller(TravelPlanController::class)->prefix('travelPlan')->name('travel.')->group(function(){

        Route::post('/allPlan', 'allPlan')->name('allPlan');
    });
});