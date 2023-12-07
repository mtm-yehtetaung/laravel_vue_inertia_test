<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Models\Menu;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [

        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    
   
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/books', [BookController::class, 'index'])->name('bookPage');
Route::get('/assets', [BookController::class, 'showAsset'])->name('assetsPage');
Route::get('/depreciation', [BookController::class, 'showDepreciation']);
Route::get('/assets/create', [BookController::class, 'createAssets'])->name('assetsRegister');
Route::post('/assets/create', [BookController::class, 'registerAssets']);
Route::put('/assets/edit/{id}', [BookController::class, 'updateAssets']);


// Route::get('/menu/create', [BookController::class, 'createMenu']);
Route::get('/menu/create', [MenuController::class, 'index'])->name('menu.index');
Route::post('/menu/create', [MenuController::class, 'storeMenu']);
Route::post('/submenu/create', [MenuController::class, 'storeSubmenu']);
require __DIR__.'/auth.php';
