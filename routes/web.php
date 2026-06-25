<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Api\SendMailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\City;
use App\Services\PageService;
use App\Services\PageSessionDataService;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

Route::get('/', function (PageService $service) {
    $url = City::whereCode(env('APP_MAIN_CITY_CODE'))->get()->first()->code;
    $data = $service->getPageData($url);
    return view($data['template'], ['data' => $data['data']]);
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
    Route::resource('/masters', MasterController::class)->only(['index', 'edit', 'update']);
});

Route::fallback(function (PageService $service) {
    $data = $service->getPageData(request()->path());
    return view($data['template'], ['data' => $data['data']]);
});
