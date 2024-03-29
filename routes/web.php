<?php

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
    return view('welcome');
});

use App\Http\Controllers\MyPlaceController;
Route::get('/myPage', [ MyPlaceController::class, 'index' ]);

use App\Http\Controllers\PostController;
Route::get('/myPost', [ PostController::class, 'index' ]);

use App\Http\Controllers\MainPageController;
Route::get('/Main', [ MainPageController::class, 'index' ])->name('main');
Route::get('/Main/page1', [ MainPageController::class, 'page1' ])->name('page1');
Route::get('/Main/page2', [ MainPageController::class, 'page2' ])->name('page2');

use App\Http\Controllers\TypeTestController;
Route::get('/Test', [TypeTestController::class, 'index' ])->name('typeTestGet');
Route::post('/Test', [TypeTestController::class, 'index' ])->name('typeTestPost');

Route::get('/Upload', [TypeTestController::class, 'upload' ])->name('typeTestUpload');
Route::get('/Create', [TypeTestController::class, 'create' ])->name('typeTestCreate');

Route::get('/Bible', [TypeTestController::class, 'bible' ])->name('typeTest.bible');

Route::get('/TestGit', [TypeTestController::class, 'git' ])->name('typeTestGit');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
