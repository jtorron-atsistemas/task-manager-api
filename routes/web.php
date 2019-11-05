<?php

/**
 * Rutas Web
 * 
 * @category WEBRouter
 * @package  LaravelCore
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/', 
    function () {
        return response()->json(
            [
                "apiName" => "Task Manager",
                "version" => "1.0.0"
            ]
        );
    }
);
