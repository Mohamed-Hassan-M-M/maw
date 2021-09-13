<?php

Route::middleware([
    // 'localeSessionRedirect',
    // 'localizationRedirect',
    // 'localeViewPath',
    'auth',
    'role:admin|super_admin',
])
    ->group(function () {

        Route::name('admin.')->prefix('admin')->group(function () {

            //home
            Route::get('/home', 'HomeController@index')->name('home');

            //role routes
            Route::get('/roles/data', 'RoleController@data')->name('roles.data');
            Route::delete('/roles/bulk_delete', 'RoleController@bulkDelete')->name('roles.bulk_delete');
            Route::resource('roles', 'RoleController');

            //admin routes
            Route::get('/admins/data', 'AdminController@data')->name('admins.data');
            Route::delete('/admins/bulk_delete', 'AdminController@bulkDelete')->name('admins.bulk_delete');
            Route::resource('admins', 'AdminController');

            //categories routes
            Route::get('/categories/data', 'CategoryController@data')->name('categories.data');
            Route::delete('/categories/bulk_delete', 'CategoryController@bulkDelete')->name('categories.bulk_delete');
            Route::resource('categories', 'CategoryController');

            //categories routes
            Route::get('/articles/data', 'ArticleController@data')->name('articles.data');
            Route::delete('/articles/bulk_delete', 'ArticleController@bulkDelete')->name('articles.bulk_delete');
            Route::resource('articles', 'ArticleController');

            //setting routes
            Route::get('/settings/general', 'SettingController@general')->name('settings.general');
            Route::get('/settings/social_links', 'SettingController@socialLinks')->name('settings.social_links');
            Route::get('/settings/mobile_links', 'SettingController@mobileLinks')->name('settings.mobile_links');
            Route::resource('settings', 'SettingController')->only(['store']);

            //profile routes
            Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('/profile/update', 'ProfileController@update')->name('profile.update');

            Route::name('profile.')->namespace('Profile')->group(function () {

                //password routes
                Route::get('/password/edit', 'PasswordController@edit')->name('password.edit');
                Route::put('/password/update', 'PasswordController@update')->name('password.update');

            });

            //contact us request routes
            Route::get('/contact_us_requests/data', 'ContactUsRequestController@data')->name('contact_us_requests.data');
            Route::delete('/contact_us_requests/bulk_delete', 'ContactUsRequestController@bulkDelete')->name('contact_us_requests.bulk_delete');
            Route::resource('contact_us_requests', 'ContactUsRequestController');
        });

    });
