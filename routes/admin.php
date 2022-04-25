<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\FAQ\FAQController;
use App\Http\Controllers\Admin\Testimonial\TestimonialController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Country\CountryController;
use App\Http\Controllers\Admin\Inquiry\InquiryController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Event\EventController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
Route::group([
    'as' => 'admin.', 'middleware' =>  ['admin'], 'prefix' => 'admin' // 'middleware' => ['role:ROLE_CANDIDATE'],
], function ($router) {

    $router->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Slider
    $router->resource('slider', SliderController::class);
    $router->get('slider/{id}/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');
    $router->get('slider-data', [SliderController::class, 'getAllData'])->name('slider.data');

    //Testimonial
    $router->resource('testimonial', TestimonialController::class);
    $router->get('testimonial/{id}/destroy', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    $router->get('testimonial-data', [TestimonialController::class, 'getAllData'])->name('testimonial.data');

    //News
    $router->resource('news', NewsController::class);
    $router->get('news/{id}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
    $router->get('news-data', [NewsController::class, 'getAllData'])->name('news.data');

    //Event
    $router->resource('event', EventController::class);
    $router->get('event/{id}/destroy', [EventController::class, 'destroy'])->name('event.destroy');
    $router->get('event-data', [EventController::class, 'getAllData'])->name('event.data');

    //Team
    $router->resource('team', TeamController::class);
    $router->get('team/{id}/destroy', [TeamController::class, 'destroy'])->name('team.destroy');
    $router->get('team-data', [TeamController::class, 'getAllData'])->name('team.data');

    //Team
    $router->resource('client', ClientController::class);
    $router->get('client/{id}/destroy', [ClientController::class, 'destroy'])->name('client.destroy');
    $router->get('client-data', [ClientController::class, 'getAllData'])->name('client.data');

    //Page
    $router->resource('page', PageController::class);
    $router->get('page/{id}/destroy', [PageController::class, 'destroy'])->name('page.destroy');
    $router->get('page-data', [PageController::class, 'getAllData'])->name('page.data');

    //faq
    $router->resource('faq', FAQController::class);
    $router->get('faq/{id}/destroy', [FAQController::class, 'destroy'])->name('faq.destroy');
    $router->get('faq-data', [FAQController::class, 'getAllData'])->name('faq.data');


    //Course
    $router->resource('course', CourseController::class);
    $router->get('course/{id}/destroy', [CourseController::class, 'destroy'])->name('course.destroy');
    $router->get('course-data', [CourseController::class, 'getAllData'])->name('course.data');

    //Course
    $router->resource('country', CountryController::class);
    $router->get('country/{id}/destroy', [CountryController::class, 'destroy'])->name('country.destroy');
    $router->get('country-data', [CountryController::class, 'getAllData'])->name('country.data');

    //Inquiry
    $router->resource('inquiry', InquiryController::class);
    $router->get('inquiry-data', [InquiryController::class, 'getAllData'])->name('inquiry.data');

    //Category
    $router->resource('category', CategoryController::class);
    $router->get('category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    $router->get('category-data', [CategoryController::class, 'getAllData'])->name('category.data');
    $router->post('category-upload-image', [CategoryController::class, 'uploadFile'])->name('category.upload-image');

    //Sub Category
    $router->resource('category.subcategory', CategoryController::class);
    $router->post('subcategory-upload-image', [CategoryController::class, 'uploadFile'])->name('subcategory.upload-image');
    $router->get('category/{slug}/subcategory/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.subcategory.destroy');
    $router->get('sub-category-data/{slug}', [CategoryController::class, 'getAllData'])->name('subcategory.data');

    //---------------------------------------------------------------------------------------------------------
    //  SETTING RESOURCE ROUTES
    //---------------------------------------------------------------------------------------------------------
    $router->get('/settings/{group}/loadSettingForms', [SettingController::class, 'loadSettingForms'])->name('setting.loadSettingForms');
    $router->resource('setting', SettingController::class);
});
