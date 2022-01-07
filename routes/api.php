<?php

use App\Http\Controllers\V1\TestController;
use App\Http\Controllers\V1\UserController;
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

/****************
 *
 *  PUBLIC ROUTES FOR API V1
 *
 */


Route::prefix('v1')->group(function(){
    Route::get('test', function(){
        return 'test v1';
    });
    Route::post('/user/register', [UserController::class, 'register']);
    Route::post('/user/login', [UserController::class, 'login']);
});

Route::group([
    'prefix'        =>  'v1',
    'middleware'    => ['auth:sanctum']
],
function(){
        Route::get('/user/list', [UserController::class, 'index']);
        Route::post('/user/logout', [UserController::class, 'logout']);


        Route::get('test2', function(){
            return 'test v1';
        });

});
