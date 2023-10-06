<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Categoria;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

   
Route::middleware(['auth', 'verified', 'can:admin'])->group(function () {

        Route::get('/produtos/cadastrar', [ProductController::class, 'create'])->name('cadastro');
        Route::delete('/produtos/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::post('/produtos/salvar', [ProductController::class, 'store'])->name('product.store');
        Route::get('/produtos/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');


        Route::get('/categorias/cadastrar', [CategoryController::class, 'create'])->name('cadastro-categoria');
        Route::delete('/categorias/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::post('/categorias/salvar', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/categorias/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::patch('/categorias/{category}', [CategoryController::class, 'update'])->name('categories.update');

    });

    Route::get('/produtos/visualizar', [ProductController::class, 'index'])->name('visualizar');
    Route::get('/categorias/visualizar', [CategoryController::class, 'index'])->name('categoria-visualizar');
  


require __DIR__.'/auth.php';
