<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\TicketsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => '/guests'], function () {

    Route::get("/", [GuestsController::class, "index"])->name("getGuests");
    
    Route::post("/create", [GuestsController::class, "letrehozas"])->name("createGuest");
    
    Route::put("/{guest}", [GuestsController::class, "update"])->name("updateGuest");
    
    Route::delete("/{guest}", [GuestsController::class, "torles"])->name("deleteGuest");

});

Route::group(['prefix' => '/tickets'], function () {

    Route::get("/", [TicketsController::class, "index"])->name("getTickets");

    Route::post("/create", [TicketsController::class, "letrehozas"])->name("createTickets");

    Route::put("/{ticket}", [TicketsController::class, "update"])->name("updateTickets");

    Route::delete("/{ticket}", [TicketsController::class, "torles"])->name("deleteTickets");

});
