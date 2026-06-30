<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Api\SendMailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Services\CityService;
use App\Services\PageService;
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

Route::get('/', function (PageService $pageService, CityService  $cityService) {
    $city = $cityService->getByCode(config('app.main_city_code'));
    $result = $pageService->getPageData($city->code);
    return view($result->template, ['data' => $result->data]);
})->name('main');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/geography', [PageController::class, 'geography'])->name('geography');
Route::get('/guarantee', [PageController::class, 'guarantee'])->name('guarantee');
Route::get('/masters', [PageController::class, 'masters'])->name('masters');
Route::get('/partner', [PageController::class, 'partner'])->name('partner');
Route::get('/reviews', [PageController::class, 'reviews'])->name('reviews');
Route::post('/send-mail', [SendMailController::class, 'sendMail'])->name('sendMail');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/enter', [UserController::class, 'loginForm'])->name('login');
    Route::post('/enter', [UserController::class, 'loginStore'])->name('login.store');
});

Route::get('/exit', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
    Route::resource('/masters', MasterController::class)->only(['index', 'edit', 'update', 'destroy']);
});

Route::fallback(function (PageService $service) {
    $result = $service->getPageData(request()->path());
    return view($result->template, ['data' => $result->data]);
});
