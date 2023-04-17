    <?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\CarrinhoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\Api\CompraController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ItensCompraController;

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


Route::get('categories/{uuid}/items', [ItemController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);

//Route::get('carrinho', [CarrinhoController::class, 'index']);
Route::resource('carrinho', CarrinhoController::class);
Route::get('carrinho/total-cart/{uui_cliente}', [CarrinhoController::class,'totalcart']);

Route::get('compra', [CompraController::class, 'index']);
Route::resource('compra', CompraController::class);


Route::get('cliente', [ClienteController::class, 'index']);
Route::resource('cliente', ClienteController::class);;

Route::get('intens-compra', [ItensCompraController::class, 'index']);
Route::resource('intens-compra', ItensCompraController::class);

Route::resource('orders', OrderController::class);

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

   // Route::resource('orders', OrderController::class);

});
