<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//AUTH
Route::post('/create', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

//esta proteccion de auth:sanctum, se asegura que ñlas peticiones que se hagan a esa ruta vengan autenticadas indicando el token de autenticacion, si no es valido no se ejecuta la ruta
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {   
    return $request->user();
});


    //MIDDLEWARE    //middleware('example'), example viene del Kernel
// Route::middleware('example')->get('/', [ExampleController::class, 'index']);
// Route::get('/no-access', [ExampleController::class, 'noAccess'])->name('no-access');

    //GRUPOS    -   ejemplos
// Route::middleware('example')->group(function (){
//     Route::get('/', [ExampleController::class, 'index']);
//     Route::get('/', [ExampleController::class, 'index']);
//     Route::get('/', [ExampleController::class, 'index'])->withoutMiddleware('admin');   //podemos quitarle el middleware especifico, le quitamos el middleware admin, en caso tengamos en arreglo del middleware Route::middleware(['example','admin])
//     Route::get('/', [ExampleController::class, 'index']);
// });
