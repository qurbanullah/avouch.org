<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\packages\DownloadPackageApiController;

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

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post("/logout", [AuthenticationController::class, 'logout']);
});


Route::post("/register", [AuthenticationController::class, 'register']);
Route::post("/login", [AuthenticationController::class, 'login']);

Route::get("download-package/{package}", [DownloadPackageApiController::class, 'downloadPackage']);
Route::get("download-package-database/{packageDatabaseFile}", [DownloadPackageApiController::class, 'downloadPackagesDatabase']);
Route::get("download-package-info-file/{packageInfoFile}", [DownloadPackageApiController::class, 'downloadPackagesInfoFiles']);
