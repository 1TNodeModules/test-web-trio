<?php
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use App\Http\Controllers\Api\PersonsController;
use App\Http\Controllers\Api\CompaniesController;
use App\Http\Controllers\Api\JobsController;

Route::group(['as' => 'api.'], function () {
    Orion::resource('companies', CompaniesController::class);
    Orion::resource('jobs',  JobsController::class);
    Orion::resource('persons', PersonsController::class);
    Orion::hasManyResource('persons', 'jobs', PersonsController::class);
});
