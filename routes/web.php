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

Route::get('/', function () {
    return view('welcome');
});


/*
 * 运营后台
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'manager'], function () {
    // 登录页面
    Route::get('auth/login', [
        'as' => 'admin.auth.login.get',
        'uses' => 'AuthController@getLogin',
    ]);
    // 登录提交
    Route::post('auth/login', [
        'as' => 'admin.auth.login.post',
        'uses' => 'AuthController@postLogin',
    ]);
    Route::group(['middleware' => ['admin.auth']], function () {
        #登出
        Route::get('logout', [
            'as' => 'admin.auth.logout',
            'uses' => 'AuthController@logout',
        ]);
        Route::get('/', function () {
            return redirect(route('admin.dashboard'));
        });
        # Dashboard
        // 后台统计信息
        Route::get('dashboard', [
            'as' => 'admin.dashboard',
            'uses' => 'DashboardController@dashboard',
        ]);
        /**
         * 目的地管理
         */
         Route::get('teach/addresses', [
             'as' => 'admin.teach.addresses.index',
             'uses' => 'TeachAddressController@index',
         ]);
        Route::get('teach/addresses/create', [
             'as' => 'admin.teach.addresses.create',
             'uses' => 'TeachAddressController@create',
         ]);
        Route::post('teach/addresses', [
             'as' => 'admin.teach.addresses.store',
             'uses' => 'TeachAddressController@store',
         ]);
        Route::get('teach/addresses/{id}', [
             'as' => 'admin.teach.addresses.show',
             'uses' => 'TeachAddressController@show',
         ]);
        Route::delete('teach/addresses/{id}', [
             'as' => 'admin.teach.addresses.destory',
             'uses' => 'TeachAddressController@destory',
         ]);
        Route::get('teach/addresses/{id}/edit', [
             'as' => 'admin.teach.addresses.edit',
             'uses' => 'TeachAddressController@edit',
         ]);
        Route::put('teach/addresses/{id}', [
             'as' => 'admin.teach.addresses.update',
             'uses' => 'TeachAddressController@update',
         ]);
        Route::get('teach/addressesmultiDestory', [
             'as' => 'admin.teach.addresses.multiDestory',
             'uses' => 'TeachAddressController@multiDestory',
         ]);
        Route::get('teach/addressesmultiUpdate', [
             'as' => 'admin.teach.addresses.multiUpdate',
             'uses' => 'TeachAddressController@multiUpdate',
         ]);
         /**
          * 目的地的回收
          */
          Route::get('teach/addressesrecycle', [
              'as' => 'admin.teach.addresses.recycle.index',
              'uses' => 'TeachAddressController@recycleIndex',
          ]);
          /**
           * 目的地审批
           */
          Route::get('teach/addressesapproval', [
              'as' => 'admin.teach.addresses.approval.index',
              'uses' => 'TeachAddressController@approvalIndex',
          ]);
        Route::get('teach/addresses/{id}/status', [
              'as' => 'admin.teach.addresses.status.update',
              'uses' => 'TeachAddressController@statusUpdate',
          ]);

        /**
         * admins
         */
        Route::get('admins', [
            'as' => 'admin.admins.index',
            'uses' => 'AdminController@index',
        ]);
        Route::post('admins', [
            'as' => 'admin.admins.store',
            'uses' => 'AdminController@store',
        ]);
        Route::get('admins/{id}/edit', [
            'as' => 'admin.admins.edit',
            'uses' => 'AdminController@edit',
        ]);
        Route::put('admins/{id}', [
            'as' => 'admin.admins.update',
            'uses' => 'AdminController@update',
        ]);
        Route::get('admins/{id}', [
            'as' => 'admin.admins.show',
            'uses' => 'AdminController@show',
        ]);
        Route::delete('admins/{id}', [
            'as' => 'admin.admins.destroy',
            'uses' => 'AdminController@destroy',
        ]);
        /**
         * Attachment
         */
        Route::post('attachments/download', [
             'as' => 'admin.attachments.download',
             'uses' => 'AttachmentController@download',
        ]);
        Route::get('attachments', [
            'as' => 'admin.attachments.index',
            'uses' => 'AttachmentController@index',
        ]);
        Route::post('attachments', [
            'as' => 'admin.attachments.store',
            'uses' => 'AttachmentController@store',
        ]);
        Route::delete('attachments/{id}', [
            'as' => 'admin.attachments.destroy',
            'uses' => 'AttachmentController@destroy',
        ]);
        /**
         * categories
         */
        Route::get('categories', [
            'as' => 'admin.categories.index',
            'uses' => 'CategoryController@index',
        ]);
        Route::post('categories', [
            'as' => 'admin.categories.store',
            'uses' => 'CategoryController@store',
        ]);
        Route::put('categories/{id}', [
            'as' => 'admin.categories.update',
            'uses' => 'CategoryController@update',
        ]);
        Route::delete('categories/{id}', [
            'as' => 'admin.categories.destroy',
            'uses' => 'CategoryController@destroy',
        ]);
    });
});
