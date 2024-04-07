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
    return redirect('/Type');
});

use App\Http\Controllers\MyPlaceController;
Route::get('/myPage', [ MyPlaceController::class, 'index' ]);


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

Route::get('/TestLinux', [TypeTestController::class, 'linux' ])->name('typeTestLinux');

Route::get('/Type', [TypeTestController::class, 'type' ])->name('TypeTestController.type');
Route::post('/Type', [TypeTestController::class, 'type' ])->name('TypeTestControllerPost.type');
Route::post('/StoreResult', [TypeTestController::class, 'storeResult' ])->name('TypeTestController.store');

Route::get('/StoreSavedText', [TypeTestController::class, 'storeSavedText' ])->name('TypeTestController.storeSavedText');
Route::post('/StoreSavedText', [TypeTestController::class, 'storeSavedText' ])->name('TypeTestControllerPost.storeSavedText');

Route::get('/testTail', [TypeTestController::class, 'testTailwind' ])->name('TypeTestController.testTailwind');

use App\Http\Controllers\TestController;
Route::get('/TestController', [TestController::class, 'index' ])->name('TestController.index');

Route::group(['namespace'=>'App\Http\Controllers\Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');

});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

