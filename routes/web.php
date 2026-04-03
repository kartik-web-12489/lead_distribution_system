<?php
use App\Http\Controllers\Web\LeadWebController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('lead-form');
});
Route::post('/lead-form', [LeadWebController::class, 'store'])
    ->name('leads.store');
