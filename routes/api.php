<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('profile', function () {
    return [
        'series' => 200,
        'lessons' => 1600,
    ];
});

Route::get('games', function () {
//    return request()->user()->games;
    return [
        ["location" =>"location 1", "description" => "Marnix on 20210730"],
        ["location" =>"location 2", "description" => "Pijp on 20210730"],
        ["location" =>"location 3", "description" => "Verhij on 20210730"],
        ["location" =>"location 4", "description" => "Hogendorp on 20210730"],
    ];
//})->middleware('auth:api');
});
