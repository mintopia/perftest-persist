<?php

use Illuminate\Http\Request;
use Carbon\Carbon;
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
Route::get('ping', function() {
    $now = Carbon::now('UTC');
    $timestamp = filectime('index.php');
    $build = Carbon::createFromTimestampUTC($timestamp);
    $response = (object) [
        'timestamp' => $now->toIso8601String(),
        'version' => 1,
        'build_date' => $build->toIso8601String()
    ];
    return response()->json($response);
})->name('ping');

Route::resource('data', 'DataController', [
    'except' => ['create', 'edit']
]);
