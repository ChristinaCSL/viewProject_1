<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewtestcontroller;
use App\Http\Controllers\book\bookcontroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\Register;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\ActivityController;



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

// Route::get('/', function () {
//     return view('products.addproduct');
// });

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('staff/register',[viewtestcontroller::class,'viewpage'])->name('pageView');


Route::resource("bookprocess",bookcontroller::class);

Route::resource("categories",CategoryController::class);

Route::post('user/register',[Register::class,'store'])->name('RegisterPage');

Route::post('user/anotherstore',[Register::class,'anotherstore'])->name('AnotherStore');

Route::post('user/ajaxStore',[Register::class,'ajaxStore'])->name('ajaxStore');

Route::get('books/lists',[bookcontroller::class,'showList']);

Route::get('books/showLists',[bookcontroller::class,'showbookList'])->name('bookList');

Route::get('books/show',[bookcontroller::class,'showBook']);

Route::get('contact/show',[ContactController::class,'showUser']);

Route::resource('user/roles', UserController::class);

Route::get('/activity',[ActivityController::class,'index']);

Route::get('/activityTest',[ActivityController::class,'index']);






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');

Route::get('showPDF',[pdfController::class,'index'])->name('showPDF');

Route::get('exportExcel',[bookcontroller::class,'export']);

Route::get('CategoryExport',[CategoryController::class,'export']);

Route::get('admin/register',[AdminController::class,'adminReg']);

Route::post('admin/reg/process',[AdminController::class,'regProcess'])->name('adminreg.process');
