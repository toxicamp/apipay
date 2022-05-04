<?php

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


$currentDomain = config('app.currentDomain');
$cabinetDomainSet = "cabinet.{$currentDomain}";

$adminDomainSet = "admin.{$currentDomain}";

//Route::group(array('domain' => $cabinetDomainSet,'prefix' => 'cabinet'), function()
Route::group(array('prefix' => 'cabinet'), function()
{

    Route::get('/', [App\Http\Controllers\Profile\UserController::class, 'index'])->name('profile_index');
    Route::get('/me', [App\Http\Controllers\Profile\UserController::class, 'me'])->name('profile_me');
    Route::put('/update', [App\Http\Controllers\Profile\UserController::class, 'update'])->name('profile_update');
    Route::put('/2fagoogle', [App\Http\Controllers\Profile\UserController::class, 'twoFaGoogle'])->name('profile_2fagoogle');
    Route::get('/transactions', [App\Http\Controllers\Profile\UserController::class, 'transactions'])->name('profile_transactions');
    Route::get('/conclusions', [App\Http\Controllers\Profile\UserController::class, 'conclusions'])->name('profile_conclusions');
    Route::get('/statUser', [App\Http\Controllers\Profile\UserController::class, 'statUser'])->name('profile_statUser');
    Route::get('/userTransact', [App\Http\Controllers\Profile\UserController::class, 'userTransaction'])->name('profile_userTransact');
    Route::get('/conclusionsCreate', [App\Http\Controllers\Profile\UserController::class, 'conclusionsCreate'])->name('profile_conclusionsCreate');
    Route::get('/conclusionsPays', [App\Http\Controllers\Profile\UserController::class, 'conclusionsPays'])->name('profile_conclusionsPays');

    Route::get('/sample', [App\Http\Controllers\Profile\UserController::class, 'sample'])->name('profile_sample');
    Route::get('/discUser', [App\Http\Controllers\Profile\UserController::class, 'discUser'])->name('profile_discUser');
    Route::get('/changePass', [App\Http\Controllers\Auth\ResetPasswordController::class, 'changePass'])->name('profile_changePass');




    Route::resource('/news', App\Http\Controllers\Profile\NewsController::class)->except([
        'index'
    ]);
    Route::get('/api-document', [App\Http\Controllers\BaseController::class, 'apiDocument'])->name('apiDocument');

    Route::get('/arbitrary-payment', [App\Http\Controllers\Profile\UserController::class, 'arbitraryPayment'])->name('profile_arbitraryPayment');
    Route::post('/arbitrary-payment', [App\Http\Controllers\Profile\UserController::class, 'arbitraryPaymentSave'])->name('profile_arbitraryPaymentSave');

});

//Route::group(array('domain' => $adminDomainSet), function()
Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/currencies', [App\Http\Controllers\Profile\UserController::class, 'currencies'])->name('profile_currencies');
    Route::get('/affil-program', [App\Http\Controllers\Profile\UserController::class, 'affilProgram'])->name('profile_affilProgram');
    Route::get('/discount', [App\Http\Controllers\Profile\UserController::class, 'discount'])->name('profile_discount');
    Route::get('/fast-output', [App\Http\Controllers\Profile\UserController::class, 'fastOutput'])->name('profile_fastOutput');
    Route::get('/user-page', [App\Http\Controllers\Profile\UserController::class, 'userPage'])->name('profile_userPage');

    Route::resource('/users', App\Http\Controllers\Profile\ProfileController::class);


    Route::get('/news/{first}/{page}/{sort}/{param}', [App\Http\Controllers\Profile\NewsController::class, 'index'])->name('news.index');

});
//Route::resource('admin/users', App\Http\Controllers\Profile\ProfileController::class);

Route::get('/', [App\Http\Controllers\BaseController::class, 'index'])->name('index');

Route::get('/o-nas', [App\Http\Controllers\BaseController::class, 'yourSelf'])->name('yourself');

Route::get('/contact', [App\Http\Controllers\BaseController::class, 'contact'])->name('contact');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('complete-registration');

Route::post('/2fa', function () {
    return redirect('/home');
})->name('2fa')->middleware('2fa');

Route::get('/form/{payment}/{shop_id}/{currency}/{price}', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::post('/pay-cul', [\App\Http\Controllers\OrderController::class, 'payCul']);
Route::get('/table-excel', [\App\Http\Controllers\Profile\TableExcelController::class, 'index']);
Route::post('/table', [\App\Http\Controllers\Profile\TableExcelController::class, 'store'])->name('table_save_complete');

Route::get('/fail-url', [\App\Http\Controllers\OrderController::class, 'fail']);
Route::get('/success-url', [\App\Http\Controllers\OrderController::class, 'success']);
