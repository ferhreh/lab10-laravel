<?php
use App\Http\Controllers\AdminController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BandProduct;
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


Route::get('/', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::get('add-category-product', [CategoryController::class, 'add_category_product'])->name('add-category-product');
Route::get('all-category-product', [CategoryController::class, 'all_category_product'])->name('all-category-product');
Route::post('/save-category-product', [CategoryController::class, 'save_category_product'])->name('save_category_product');
Route::get('/edit-category-product/{id}', [CategoryController::class, 'edit_category_product'])->name('edit_category_product');
Route::post('/update-category-product/{id}', [CategoryController::class, 'update_category_product'])->name('update_category_product');
Route::get('/delete-category-product/{id}', [CategoryController::class, 'delete_category_product'])->name('delete_category_product');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
// layouts
Route::get('/layout', [HomeController::class, 'showCategoriesAndBrands'])->name('layout');
Route::get('/home', function () {return view('layouts.home');});
Route::get('/product', function () {return view('layouts.product');});
Route::get('/news', function () {return view('layouts.news');});
Route::get('/contact', function () {return view('layouts.contact');});
// brand
Route::get('/add-brand-product', [BandProduct::class, 'addBrandProduct'])->name('add.brand');
Route::post('/save-brand-product', [BandProduct::class, 'saveBrandProduct'])->name('save.brand');

// List all brands
Route::get('/all-brand-product', [BandProduct::class, 'allBrandProduct'])->name('all.brands');

// Activate/Deactivate brand
Route::get('/unactive-brand-product/{brand_id}', [BandProduct::class, 'unactiveBrandProduct']);
Route::get('/active-brand-product/{brand_id}', [BandProduct::class, 'activeBrandProduct']);

// Edit and delete brand
Route::get('/edit-brand-product/{id}', [BandProduct::class, 'editBrandProduct'])->name('editBrandProduct');
Route::post('/update-brand-product/{id}', [BandProduct::class, 'updateBrandProduct']);
Route::get('/delete-brand-product/{id}', [BandProduct::class, 'deleteBrandProduct'])->name('deleteBrandProduct');


