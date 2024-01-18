<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\FruitsController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Models\Fruit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// http://127.0.0.1:8000/ router -> view
// view -> welcome

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/create-fruit', function () {
    return view('fruits.create');
});

Route::get('/fruits', [FruitsController::class, 'fruitsView']);

// router -> view
// POST: http://127.0.0.1:8000/create-fruit
// -> FruitsController 
// -> ORM, uztaisi jaunu modeļa Fruit instanci
// -> 
Route::post('/create-fruit', [FruitsController::class, 'create']);


Route::get('/delete-fruit/{id}',
[FruitsController::class, 'delete']);

Route::get('/edit-fruit/{id}',
    [FruitsController::class, 'editView']);

Route::patch('/edit-fruit/{id}', 
    [FruitsController::class, 'edit']
);

Route::get('/fruit/{slug}',
    [FruitsController::class, 'returnOne']);

Route::get('/create-delivery', 
    [DeliveryController::class, 'createView']);

Route::post('/create-delivery', 
    [DeliveryController::class, 'create']);

Route::get('/delivery/{id}', 
    [DeliveryController::class, 'getOne']);
