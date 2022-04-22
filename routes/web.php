<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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

include 'admin.php';
Route::middleware('visitor')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    // Route::get('/courses', [FrontendController::class, 'serviceList'])->name('courses.list');
    Route::get('/course/{slug}', [FrontendController::class, 'courseDetail'])->name('course.detail');
    Route::get('/international', [FrontendController::class, 'internationalCourses'])->name('international.list');
    Route::get('/international/{slug}', [FrontendController::class, 'internationalDetail'])->name('international.detail');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
});
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/{slug}',[FrontendController::class,'Page'])->name('page.index');
