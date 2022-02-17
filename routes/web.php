<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FieldController,AuthController,UserController};
use App\Models\{Field,User};

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
Route::get('/login',[AuthController::class,'create'])->name('login');
Route::post('/login',[AuthController::class,'store'])->name('login.store');
Route::resource('fields', FieldController::class)
        ->breadcrumbs([
            'index' => 'Fields',
            'create' => 'New Field',
            'show' => fn(Field $field) => $field->name,
            'edit' => 'Edit',
        ]);
Route::resource('users', UserController::class)
     ->breadcrumbs([
              'index'=>'Users',
              'create'=>'New User',
              'show' =>fn(User $user)=>$user->name,
              'edit'=>'Edit'
     ]);

Route::get('/', function () {
    return inertia('Landing');
})->name('home')
->breadcrumb('Home');

//protected routes
Route::prefix('admin')
     ->middleware('auth')
     ->group(function () {
        Route::get('dashboard',fn()=>(inertia('Dashboard/Admin')))
            ->name('dashboard')
            ->breadcrumb('dashboard');
});

