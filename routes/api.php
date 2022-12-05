<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;
use App\Http\Controllers\api\NewPasswordController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\Http\Client;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', [AuthController::class, 'user']);
    
});
Route::post('/register-admins', [AuthController::class, 'register']);
Route::resource('/roles', RolesController::class);
Route::resource('/users', UserController::class);
Route::resource('/clientes', Clientcontroller::class);
Route::resource('/reports', ReportsController::class);
Route::resource('/citas', EventsController::class);  
Route::resource('/roles', RolesController::class);  
Route::resource('/equipos', EquipmentController::class);
Route::resource('/companies', CompaniesController::class);
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);

Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::delete('/clientes/restore/{client}', [ClientController::class, 'restore']); 
Route::delete('/companies/restore/{companie}', [CompaniesController::class, 'restore']); 