<?php

use App\Http\Controllers\StripeController;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test-url', [TestController::class,'test'])->name('test');

Route::get('employees',function () {
    $employees = Employee::orderBy('last_name','DESC') ->get();
    return EmployeeResource::collection($employees);
});


Route::post('/webhook', [StripeController::class, 'webhook']);
