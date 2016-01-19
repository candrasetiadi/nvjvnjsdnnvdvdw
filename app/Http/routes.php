<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 *  Set up locale and locale_prefix if other language is selected
 */
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));

    Config::set('app.locale_prefix', Request::segment(1));
}


/*
 * Set up route patterns - patterns will have to be the same as in translated route for current language
 */
foreach(Lang::get('url') as $k => $v) {

    Route::pattern($k, $v);
}


Route::group(['prefix' => Config::get('app.locale_prefix')], function() {

    // Home
    Route::get('/', 'PagesController@home');

    Route::get('/{about}/', 'PagesController@about');



    // Properties
    Route::get('/{properties}/', 'PagesController@propertyListing');

    Route::get('property/{url}', ['as' => 'url','uses' => 'PagesController@propertyView']);



    // Blogs
    Route::get('blogs', 'PagesController@blogListing');

    Route::get('blog/{url}', ['as' => 'url','uses' => 'PagesController@blogView']);



    // Customer
    Route::get('/{login}/', 'PagesController@login');

    Route::get('/{register}/', 'PagesController@register');

    Route::get('/{account}/', 'PagesController@account');
});



// Back-End
//Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin'], function () {

        // General
        Route::get('dashboard', 'AdminController@dashboard');

        Route::get('enquiries', 'AdminController@enquiries');


        // Customer
        Route::get('customers', 'AdminController@customers');


        // CMS
        Route::get('properties', 'AdminController@properties');


        // Blog
        Route::get('blog', 'AdminController@blog');

        Route::get('blog-categories', 'AdminController@blogCategories');

        Route::get('blog-comments', 'AdminController@blogComments');

        Route::get('blog-settings', 'AdminController@blogSettings');


        // Misc
        Route::get('accounts', 'AdminController@accounts');

        Route::get('settings', 'AdminController@settings');

        Route::get('index', 'AdminController@index');

        Route::get('currency', 'AdminController@currency');

        Route::get('notifications', 'AdminController@notifications');

        Route::get('io', 'AdminController@io');

        Route::get('about', 'AdminController@about');
    });
//});

Route::group(['prefix' => 'system/ajax'], function () {

    Route::group(['prefix' => 'notifications'], function () {

        Route::any('insert', 'AnalyticsController@insert');

        Route::any('getall', 'AnalyticsController@index');

        Route::any('getunread', 'AnalyticsController@getUnread');
    });

    Route::group(['prefix' => 'blog'], function () {

        Route::any('index', 'BlogController@index');

        Route::any('create', 'BlogController@create');

        Route::get('retrieve/{id}', ['as' => 'id', 'uses' => 'BlogController@retrieve']);

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'BlogController@destroy']);
    });

    Route::group(['prefix' => 'analytics'], function () {

        Route::any('getall', 'AnalyticsController@getData');
    });

    Route::group(['prefix' => 'customer'], function () {

        Route::any('login', 'CustomerController@login');

        Route::any('register', 'CustomerController@register');
    });
});


Route::controllers([

    'auth' => 'Auth\AuthController',

    'password' => 'Auth\PasswordController',
]);
