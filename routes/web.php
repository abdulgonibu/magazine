<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\MagagineController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::prefix('magazines')->group(function () {
    route::get('/view', [MagagineController::class, 'index'])->name('magazines.view');
    route::get('/add', [MagagineController::class, 'show'])->name('magazines.show');
    route::post('/store', [MagagineController::class, 'store'])->name('magazines.store');
    route::get('/edit/{id}', [MagagineController::class, 'edit'])->name('magazines.edit');
    route::post('/update/{id}', [MagagineController::class, 'update'])->name('magazines.update');
    route::get('/delete/{id}', [MagagineController::class, 'delete'])->name('magazines.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
