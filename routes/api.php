<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(
    '/payment-notification',
    function (Request $request) {
        error_log('payment-notification');
    //    print($request->all());
    }
);

Route::get(
    '/recurring-notification',
    function (Request $request) {
        error_log('recurring-notification');

    }
);

Route::get(
    '/pay-account-notification',
    function (Request $request) {
        error_log('pay-account-notification');

    }
);

Route::get(
    '/finish',
    function (Request $request) {
        error_log('finish');
      
    }
);

Route::get(
    '/unfinish',
    function (Request $request) {
        error_log('unfinish');

    }
);

Route::get(
    '/error',
    function (Request $request) {
        error_log('error');

    }
);
