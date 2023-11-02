<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::prefix('/users')->name('users.')->group(function () {
    Route::prefix('/students')->name('students.')->group(function () {
        Route::get('/index', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::get('/fetch', [StudentController::class, 'fetch'])->name('fetch');
        Route::get('/get', [StudentController::class, 'get'])->name('get');
        Route::post('/delete', [StudentController::class, 'deleteBirim'])->name('delete');
        Route::post('/status', [StudentController::class, 'departmentStatus'])->name('status.update');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::post('/update', [StudentController::class, 'update'])->name('update');
    });

    Route::prefix('/teachers')->name('teachers.')->group(function () {
        Route::get('/index', [TeacherController::class, 'index'])->name('index');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::get('/fetch', [TeacherController::class, 'fetch'])->name('fetch');
        Route::get('/get', [TeacherController::class, 'get'])->name('get');
        Route::post('/delete', [TeacherController::class, 'deleteBirim'])->name('delete');
        Route::post('/status', [TeacherController::class, 'departmentStatus'])->name('status.update');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::post('/update', [TeacherController::class, 'update'])->name('update');
    });
});
