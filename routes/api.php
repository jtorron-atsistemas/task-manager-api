<?php

/**
 * Rutas de la api
 * 
 * @category APIRouter
 * @package  LaravelCore
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get(
    '/user', 
    function (Request $request) {
        return $request->user();
    }
);

Route::group(
    [
        'prefix' => 'v1'
    ],
    function () {
        Route::group(
            [
                'prefix' => '/tasks'
            ],
            function () {
                Route::get(
                    '/',
                    'TaskController@index'
                )->name('api.v1.tasks.index');
                Route::get(
                    '/{id}',
                    'TaskController@show'
                )->name('api.v1.tasks.show');
                Route::post(
                    '/create',
                    'TaskController@create'
                )->name('api.v1.tasks.create');
                Route::put(
                    '/{id}',
                    'TaskController@update'
                )->name('api.v1.tasks.update');
                Route::delete(
                    '/{id}',
                    'TaskController@delete'
                )->name('api.v1.tasks.delete');
            }
        );
    }
);