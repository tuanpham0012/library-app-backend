<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::post('/authors/upload_image', [AuthorController::class, 'saveImage']);
    Route::resource('/authors', AuthorController::class );
    Route::get('/countries', [CountryController::class, 'index']);
});
// Route::get('/authors',function () {
//     return 'aaa';
// });
// Route::prefix('/v1')->group(function(){
//     Route::get('/authors', function () {
//         return 'aaa';
//     });
// });
