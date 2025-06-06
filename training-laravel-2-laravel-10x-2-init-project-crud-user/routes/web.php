<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\OrderController;

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

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
Route::get('list/role/{role}', [CrudUserController::class, 'listUserByRole'])->name('user.listByRole');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('orders/create/all', [OrderController::class, 'createOrdersForAllUsers'])->name('orders.createAll');
Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/assign-products', [OrderController::class, 'assignProductsToAllOrders'])->name('orders.assignProducts');
