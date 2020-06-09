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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::any('admin/login','Admin\LoginController@login');
Route::post('admin/dologin','Admin\LoginController@dologin');
Route::get('user/register','User\RegisterController@register');
Route::any('admin/getUser','Admin\UserController@getUser');
Route::any('admin/code','Admin\UserController@code');

Route::any('admin/mima','Admin\LoginController@mima');
Route::any('admin/bibao','Admin\UserController@bibao');


Route::group(['prefix'=>'admin' , 'namespace' => 'Admin' , 'middleware'=>'isLogin'],function (){
    Route::any('index','IndexController@index');
    Route::any('loginout','LoginController@loginout');
    Route::any('welcome','IndexController@welcome');

    Route::get('name/del','NameController@del');
    //用户相关的路由
    Route::resource('name','NameController');

    //角色模块
    Route::any('role/auth/{id}','RoleController@auth');
    Route::resource('role','RoleController');  //角色
    Route::resource('permission','PermissionController');  //权限


});
















