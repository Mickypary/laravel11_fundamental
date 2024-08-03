<?php

// composer dump-autoload

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Calculate;
use App\Http\Controllers\EmailController;
use App\Http\Middleware\CheckPrice;

// Route::get('/', function () {
//     return view('welcome');
// })->name('front_home');

Route::get('about', function () {
    return view('about_page');
})->name('front_about');

// Route::view('about', 'about_page');

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('student/add', [StudentController::class, 'add'])->name('student.add')->middleware(CheckPrice::class);
Route::get('view', [StudentController::class, 'view'])->name('student.view')->middleware(CheckPrice::class);
Route::get('view_single/{id}', [StudentController::class, 'view_single']);
Route::post('update/{id}', [StudentController::class, 'update'])->name('update')->middleware(CheckPrice::class);
Route::get('delete/{id}', [StudentController::class, 'delete'])->name('delete');
Route::get('trashed', [StudentController::class, 'trashed'])->name('trashed');
Route::get('restore/{id}', [StudentController::class, 'restore'])->name('restore');
Route::get('force-delete/{id}', [StudentController::class, 'force_delete'])->name('force');
Route::get('view_join', [StudentController::class, 'join'])->name('student.join')->middleware(CheckPrice::class);
Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::post('store', [StudentController::class, 'store'])->name('store');


Route::get('check/{mark}', [Calculate::class, 'get_result'])->name('result');
Route::get('send-email', [EmailController::class, 'sendEmail'])->name('send.email');


Route::group(['prefix' => 'student'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('student_home')->middleware('check_price');
    Route::get('about', [StudentController::class, 'about'])->name('student_about')->middleware('check_price');
    Route::get('profile/{username}', [StudentController::class, 'profile'])->name('student.profile');
});

Route::name('location.')->group(function () {
    // Route::get('/', [StudentController::class, 'index'])->name('student_home')->middleware('check_price');
    // Route::get('about', [StudentController::class, 'about'])->name('student_about')->middleware('check_price');
    // Route::get('profile/{username}', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('city', function () {
        echo 'New York';
    })->name('maincity');
});

// Route::middleware(['check_price'])->group(function () {
//     Route::get('/', [StudentController::class, 'index'])->name('student_home')->middleware('check_price');
//     Route::get('about', [StudentController::class, 'about'])->name('student_about')->middleware('check_price');
//     Route::get('profile/{username}', [StudentController::class, 'profile'])->name('student.profile');
// });
