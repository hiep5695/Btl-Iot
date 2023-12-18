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
//---
//admin
//url: /public/admin/login
Route::get('backend/login', function () {
    return view('admin.login.form_login');
});
//url: /public/admin/login-post
Route::post('backend/login-post', function () {
    $email = Request::get("email");
    $password = Request::get("password");
       
    //sử dụng đối tượng Auth để kiểm tra đăng nhập
    if(Auth::attempt(["email"=>$email,"password"=>$password])){
        $user = Auth::user();
        return redirect(url('backend'));
    }
        
    else
        return redirect(url('backend/login?notify=invalid'));
});
//url: /public/admin/logout
Route::get('backend/logout', function () {
    Auth::logout();
    return redirect(url('backend/login'));
});
//url: /public/backend -> khi đó sẽ load Controller HomeController
Route::get('backend', function () {
    return view('admin.home.read');
})->middleware("check_login");

//---
//để sử dụng Controller thì phải khai báo ở đây
use App\Http\Controllers\Admin\DoamController;
//read
Route::get('backend/doam',[DoamController::class,'read']);
//create
Route::get('backend/users/create',[DoamController::class,'create']);
//create post
Route::post('backend/users/create-post',[DoamController::class,'createPost']);
//update
Route::get('backend/users/update/{id}',[DoamController::class,'update']);
//update post
Route::post('backend/users/update-post/{id}',[DoamController::class,'updatePost']);
//delete
Route::get('backend/users/delete/{id}',[DoamController::class,'delete']);
//---
//---
//để sử dụng Controller thì phải khai báo ở đây
use App\Http\Controllers\Admin\LsdoamController;
//read
Route::get('backend/lsdoam',[LsdoamController::class,'read']);
//create
Route::get('backend/update',[LsdoamController::class,'update']);
//create post

use App\Http\Controllers\Admin\TudongController;
//read
Route::get('backend/tudong',[TudongController::class,'read']);
//create
Route::get('backend/tudong/create',[TudongController::class,'create']);
//create post
Route::post('backend/tudong/create-post',[TudongController::class,'createPost']);
//update
Route::get('backend/tudong/update/{id}',[TudongController::class,'update']);
//update post
Route::post('backend/tudong/update-post/{id}',[TudongController::class,'updatePost']);
//delete
Route::get('backend/tudong/delete/{id}',[TudongController::class,'delete']);