<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    $client = Elasticsearch\ClientBuilder::create()->build();
    var_dump($client);
});

Route::get('/users', [UserController::class, 'all']);
//Route::post('/users', [UserController::class, 'create']);
