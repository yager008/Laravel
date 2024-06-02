<?php

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeTestController;
use App\Http\Controllers\BibleApiController;
use App\Http\Controllers\LoremApiController;
use Illuminate\Support\Str;

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



//Route::get('/', [TypeTestController::class, 'welcome'])->name('welcome');


Route::get('/', function () {
    return redirect()->route('login');
//    return view('welcome');
});

//Route::middleware(['check.authenticated'])->group(function () {
//    Route::get('/', [TypeTestController::class, 'type'])->name('TypeTestController.type');
//    // Other routes that require authentication
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profileDelete', [ProfileController::class, 'reset'])->name('profile.reset');

    Route::get('/dashboard', [TypeTestController::class, 'type' ])->name('TypeTestController.type');


//use App\Http\Controllers\MyPlaceController;
//Route::get('/myPage', [ MyPlaceController::class, 'index' ]);




//use App\Http\Controllers\MainPageController;
//Route::get('/Main', [ MainPageController::class, 'index' ])->name('main');
//Route::get('/Main/page1', [ MainPageController::class, 'page1' ])->name('page1');
//Route::get('/Main/page2', [ MainPageController::class, 'page2' ])->name('page2');
//
//Route::get('/Test', [TypeTestController::class, 'index' ])->name('typeTestGet');
//Route::post('/Test', [TypeTestController::class, 'index' ])->name('typeTestPost');

//Route::get('/Upload', [TypeTestController::class, 'upload' ])->name('typeTestUpload');
//Route::get('/Create', [TypeTestController::class, 'create' ])->name('typeTestCreate');

Route::get('/Bible', [TypeTestController::class, 'bible' ])->name('typeTest.bible');
Route::get('/Lorem', [TypeTestController::class, 'lorem' ])->name('typeTest.lorem');

//Route::get('/TestGit', [TypeTestController::class, 'git' ])->name('typeTestGit');
//Route::get('/TestLinux', [TypeTestController::class, 'linux' ])->name('typeTestLinux');

//Route::get('/Type', [TypeTestController::class, 'type' ])->name('TypeTestController.type');
//Route::get('/dashboard', [TypeTestController::class, 'type' ])->name('TypeTestController.type');

Route::post('/dashboard', [TypeTestController::class, 'type' ])->name('TypeTestControllerPost.type');
Route::post('/StoreResult', [TypeTestController::class, 'storeResult' ])->name('TypeTestController.store');
Route::post('/openSavedText', [TypeTestController::class, 'openSavedText' ])->name('TypeTestController.openSavedText');
Route::post('/exitSavedTextMode', [TypeTestController::class, 'exitSavedTextMode' ])->name('TypeTestController.exitSavedTextMode');

Route::get('/StoreSavedText', [TypeTestController::class, 'storeSavedTextIfCheckboxIsOn' ])->name('TypeTestController.storeSavedTextIfCheckBoxIsOn');
Route::post('/StoreSavedText', [TypeTestController::class, 'storeSavedTextIfCheckboxIsOn' ])->name('TypeTestControllerPost.storeSavedTextIfCheckBoxIsOn');
Route::post('/DeleteSavedText', [TypeTestController::class, 'deleteSavedText' ])->name('TypeTestControllerPost.deleteSavedText');

Route::get('/testTail', [TypeTestController::class, 'testTailwind' ])->name('TypeTestController.testTailwind');

//use App\Http\Controllers\TestController;
//Route::get('/TestController', [TestController::class, 'index' ])->name('TestController.index');

//Route::group(['namespace'=>'App\Http\Controllers\Post'], function() {
//    Route::get('/posts', 'IndexController')->name('post.index');
//    Route::get('/create', 'CreateController')->name('post.create');
//    Route::post('/posts', 'StoreController')->name('post.store');
//    Route::get('/posts/{post}', 'ShowController')->name('post.show');
//    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
//    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
//    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
//});

Route::get('/BibleApiRequest', [BibleApiController::class, 'index' ])->name('BibleApiController.index');
Route::post('/BibleApiRequest', [BibleApiController::class, 'index' ])->name('BibleApiControllerPost.index');

Route::get('/LoremApiRequest', [LoremApiController::class, 'index' ])->name('LoremApiController.index');
Route::post('/LoremApiRequest', [LoremApiController::class, 'index' ])->name('LoremApiControllerPost.index');
});

Route::fallback(function () {
    return redirect('/');
});

//Route::post('/forgot-password', function (Request $request) {
//    $request->validate(['email' => 'required|email']);
//
//    $status = Password::sendResetLink(
//        $request->only('email')
//    );
//
//    return $status === Password::RESET_LINK_SENT
//        ? back()->with(['status' => __($status)])
//        : back()->withErrors(['email' => __($status)]);
//})->middleware('guest')->name('password.email');
//
//Route::get('/reset-password/{token}', function (string $token) {
//    return view('auth.reset-password', ['token' => $token]);
//})->middleware('guest')->name('password.reset');
//
//Route::post('/reset-password', function (Request $request) {
//    $request->validate([
//        'token' => 'required',
//        'email' => 'required|email',
//        'password' => 'required|min:8|confirmed',
//    ]);
//
//    $status = Password::reset(
//        $request->only('email', 'password', 'password_confirmation', 'token'),
//        function (User $user, string $password) {
//            $user->forceFill([
//                'password' => Hash::make($password)
//            ])->setRememberToken(Str::random(60));
//
//            $user->save();
//
//            event(new PasswordReset($user));
//        }
//    );
//
//    return $status === Password::PASSWORD_RESET
//        ? redirect()->route('login')->with('status', __($status))
//        : back()->withErrors(['email' => [__($status)]]);
//})->middleware('guest')->name('password.update');


// Password Reset Link Request Routes...
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');

// Password Reset Routes...
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');

Route::get('/send-test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email!', function ($message) {
        $message->to('test@example.com')
            ->subject('Test Email');
    });


    return 'Test email sent!';
});

require __DIR__.'/auth.php';
