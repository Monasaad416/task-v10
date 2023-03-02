<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleCotroller;
use App\Http\Controllers\Admin\PostCotroller;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryCotroller;
use App\Http\Controllers\Admin\AdminCotroller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ,'auto_check_permissions'],
        'prefix' => LaravelLocalization::setLocale(),

    ], function(){
        Route::get('/dashboard', [HomeController::class,'index'])->name('index');
        Route::get('sub-cats-byCat/{category_id}', [PostCotroller::class, 'getSubCatsByCat'])->name("getSubCatsByCat");

        Route::resources([
            'categories' => CategoryCotroller::class,
            'posts' => PostCotroller::class,
            'roles'=> RoleCotroller::class,
            'admins'=> AdminCotroller::class,
        ]);


    });






// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
