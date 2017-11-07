<?php

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

Route::name('admin.')->group(function() {

    Route::prefix('auth')->group(
        function($router) {
            $router->view('login', 'admin.auths.login')->name('auth.login');
            $router->post('login', 'AuthController@login')->name('auth.login');
            $router->get('logout', 'AuthController@logout')->name('auth.logout');
        }
    );

    Route::middleware('authentication')->group(
        function($router) {
            $router->get('/', 'IndexController@index')->name('index');
            $router->get('/clear', 'IndexController@clear')->name('clear');
            $router->resource('menus', 'MenusController');
            $router->delete('permissions/batch', 'PermissionsController@batch')->name('permissions.batch');
            $router->resource('permissions', 'PermissionsController');
            $router->delete('roles/batch', 'RolesController@batch')->name('roles.batch');
            $router->resource('roles', 'RolesController');
            $router->delete('users/batch', 'UsersController@batch')->name('users.batch');
            $router->resource('users', 'UsersController');
        }
    );
});
