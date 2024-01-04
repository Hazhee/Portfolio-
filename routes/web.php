<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeSlideController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
})->name('home');
Route::get('/about',[AboutController::class, 'index'])->name('about.index');
Route::get('/blogs',[BlogController::class, 'allBlogs'])->name('blog.all');
Route::get('/portfolios',[PortfolioController::class, 'allPortfolios'])->name('portfolio.all');

Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts',[ContactController::class, 'store'])->name('contact.store');

Route::get('/portfolio/details/{id}',[PortfolioController::class, 'show'])->name('portfolio.details');
Route::get('/blog/details/{id}',[BlogController::class, 'show'])->name('blog.details');
Route::get('/blog/categories/{id}',[BlogController::class, 'BlogCategory'])->name('catg.blog.details');


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard/profile',[AdminController::class, 'show_profile'])->name('profile.show');
Route::get('/dashboard/profile/edit',[AdminController::class, 'edit_profile'])->name('profile.edit');
Route::post('/dashboard/profile/update',[AdminController::class, 'update_profile'])->name('profile.update');

Route::get('/dashboard/password/edit',[AdminController::class, 'edit_password'])->name('edit.password');
Route::put('/dashboard/password/update',[AdminController::class, 'update_password'])->name('update.password');

Route::get('/dashboard/home/slide/edit',[HomeSlideController::class, 'homeSlideEdit'])->name('homeSlide.edit');
Route::post('/dashboard/home/slide/update',[HomeSlideController::class, 'homeSlideupdate'])->name('homeSlide.update');

Route::get('/dashboard/about/page/edit',[AboutController::class, 'aboutPageEdit'])->name('about.edit');
Route::post('/dashboard/about/page/update',[AboutController::class, 'aboutPageupdate'])->name('about.update');

Route::get('/dashboard/about/multi/image',[AboutController::class, 'aboutMultiImage'])->name('about.multi.image');
Route::post('/dashboard/about/multi/image',[AboutController::class, 'aboutMultiImageStore'])->name('multi.image.store');
Route::get('/dashboard/about/multi/images',[AboutController::class, 'aboutAllMultiImage'])->name('multi.image.index');
Route::get('/dashboard/about/multi/image/edit/{id}',[AboutController::class, 'aboutMultiImageEdit'])->name('multi.image.edit');
Route::post('/dashboard/about/multi/image/update',[AboutController::class, 'aboutMultiImageUpdate'])->name('multi.image.update');

Route::get('/dashboard/about/multi/image/destroy/{id}',[AboutController::class, 'aboutMultiImageDestroy'])->name('multi.image.destroy');

Route::get('/dashboard/portfolios',[PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/dashboard/portfolios/create',[PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('/dashboard/portfolios',[PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/dashboard/portfolios/edit/{id}',[PortfolioController::class, 'edit'])->name('portfolio.edit');
Route::post('/dashboard/portfolios/update',[PortfolioController::class, 'update'])->name('portfolio.update');
Route::get('/dashboard/portfolios/destroy/{id}',[PortfolioController::class, 'destroy'])->name('portfolio.destroy');

Route::get('/dashboard/categories',[CategoryController::class, 'index'])->name('category.index');
Route::get('/dashboard/categories/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('/dashboard/categories',[CategoryController::class, 'store'])->name('category.store');
Route::get('/dashboard/categories/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/dashboard/categories/update',[CategoryController::class, 'update'])->name('category.update');
Route::get('/dashboard/categories/destroy/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');


Route::get('/dashboard/blogs',[BlogController::class, 'index'])->name('blog.index');
Route::get('/dashboard/blogs/create',[BlogController::class, 'create'])->name('blog.create');
Route::post('/dashboard/blogs',[BlogController::class, 'store'])->name('blog.store');
Route::get('/dashboard/blogs/edit/{id}',[BlogController::class, 'edit'])->name('blog.edit');
Route::post('/dashboard/blogs/update',[BlogController::class, 'update'])->name('blog.update');
Route::get('/dashboard/blogs/destroy/{id}',[BlogController::class, 'destroy'])->name('blog.destroy');

Route::get('/dashboard/contacts',[ContactController::class, 'AllContact'])->name('contact.all');
Route::get('/dashboard/contacts/destroy/{id}',[ContactController::class, 'destroy'])->name('contact.destroy');











require __DIR__.'/auth.php';
