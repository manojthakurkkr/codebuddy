<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
});
Route::prefix('admin')->middleware('auth','admin')->group(function () {
    Route::get('/dashboard', [AdminUsersController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users.index');
    Route::get('admin/category/treeview', [CategoriesController::class, 'manageCategory'])->name('admin.categories.manageCategory');
    Route::get('admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('admin/add/category', [CategoriesController::class, 'add'])->name('admin.category.add');
    Route::post('admin/store/category', [CategoriesController::class, 'store'])->name('admin.category.store');

});


require __DIR__.'/auth.php';
