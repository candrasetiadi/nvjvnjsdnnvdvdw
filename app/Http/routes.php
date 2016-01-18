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


Route::group(array('prefix' => Config::get('app.locale_prefix')), function() {

    Route::get('/', 'HomeController@index');

    Route::get('/{about}/', 'PagesController@about');

    Route::group(['prefix' => '/{products}/'], function () {

        Route::any('/', 'PagesController@showGroups');

        Route::any('/{search}/', 'ProductsController@search');
    });

    Route::any('products-search/{key}', ['as' => 'key', 'uses' => 'ProductsController@productsSearch']);

    Route::any('/{bestseller}/', 'ProductsController@bestseller');

    Route::any('/{overstock}/', 'ProductsController@overstock');

    Route::get('group/{data}', ['as' => 'data', 'uses' => 'PagesController@showCategories']);

    Route::get('category/{data}', ['as' => 'data', 'uses' => 'PagesController@showSubcategories']);

    Route::get('subcategory/{data}', ['as' => 'data', 'uses' => 'PagesController@showSubProducts']);

    Route::get('product-detail/{url}', array('as' => 'url', 'uses' => 'ProductsController@show'));

    Route::get('product-search/{search}', array('as' => 'url', 'uses' => 'ProductsController@productsSearch'));

    Route::get('/{blogs}/', 'BlogController@listing');

    Route::group(['prefix' => 'blog'], function () {

        Route::any('/', 'BlogController@listing');

        Route::any('{url}', array('as' => 'url', 'uses' => 'BlogController@show'));
    });

    Route::get('/{catalogues}/', array('as' => 'url', 'uses' => 'PdfController@listing'));

    Route::get('pdfcatalogue/{file}', array('as' => 'file', 'uses' => 'PdfController@show'));

    Route::get('/{projects}/', 'PagesController@projects');

    Route::get('/{materials}/', 'PagesController@materials');

    Route::get('/{fabrics}/', 'PagesController@fabrics');

    Route::get('/{showroom}/', 'PagesController@showroom');

    Route::get('/{contact}/', 'PagesController@contact');

    Route::any('/{checkout}/', 'PagesController@checkout');

    Route::get('/{login}/', 'PagesController@login');

    Route::get('/{register}/', 'PagesController@register');

    Route::get('/{account}/', 'PagesController@account');

    Route::get('enquiries/view/{id}', ['as' => 'id', 'uses' => 'PagesController@viewEnquiry']);

    Route::get('customer/logout', 'CustomerController@logout');

});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin'], function () {

        // Bull
        Route::get('import', 'ImportController@import');
        // End of Bull

        Route::get('/', function() {

            return redirect('/admin/products');
        });

        // Main Board
        //Route::get('dashboard', 'DashboardController@index');

        Route::get('dashboard', function() {

            return redirect('/admin/products');
        });

        Route::get('enquiries', 'EnquiriesController@index');

        Route::get('customers', 'CustomerController@index');


        // CMS
        Route::get('categories', 'CategoriesController@index');

        Route::get('collection', 'CollectionController@index');

        Route::get('products', 'ProductsController@index');

        Route::get('projects', 'ProjectsController@index');

        Route::get('awards', 'AwardsController@index');

        Route::get('homeslide', 'HomeslideController@index');

        Route::get('pages', 'PagesController@index');

        Route::get('pdf', 'PdfController@index');


        // Blog
        Route::get('blog', 'BlogController@getAll');

        Route::get('blogsample', 'BlogController@sample');


        // Misc
        Route::get('settings', 'SettingsController@index');

        Route::get('about', 'PagesController@adminAbout');
    });
});

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

    Route::group(['prefix' => 'group'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'NavigationController@getGroup']);

        Route::any('index', 'NavigationController@index');

        Route::any('create', 'NavigationController@createGroup');

        Route::any('destroy/{id}', ['as' => 'id', 'uses' => 'NavigationController@destroyGroup']);
    });

    Route::group(['prefix' => 'category'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'NavigationController@getCat']);

        Route::any('getByParent/{id}', ['as' => 'id', 'uses' => 'NavigationController@getCatByGroup']);

        Route::any('create', 'NavigationController@createCat');

        Route::any('destroy/{id}', ['as' => 'id', 'uses' => 'NavigationController@destroyCat']);
    });

    Route::group(['prefix' => 'subcategory'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'NavigationController@getSub']);

        Route::any('getByParent/{id}', ['as' => 'id', 'uses' => 'NavigationController@getSubByCat']);

        Route::any('create', 'NavigationController@createSub');

        Route::any('destroy/{id}', ['as' => 'id', 'uses' => 'NavigationController@destroySub']);
    });

    Route::group(['prefix' => 'categories'], function () {

        Route::any('creategroup', 'CategoriesController@storeGroup');

        Route::any('deletegroup/{id}', ['as' => 'id', 'uses' => 'CategoriesController@destroyGroup']);

        Route::any('createcategory', 'CategoriesController@storeCategory');

        Route::any('deletecategory/{id}', ['as' => 'id', 'uses' => 'CategoriesController@destroyCategory']);

        Route::any('createsubcategory', 'CategoriesController@storeSubcategory');

        Route::any('deletesubcategory/{id}', ['as' => 'id', 'uses' => 'CategoriesController@destroySubcategory']);
    });

    Route::group(['prefix' => 'enquiry'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'EnquiriesController@get']);

        Route::any('tag/{id}', ['as' => 'id', 'uses' => 'EnquiriesController@tag']);

        Route::any('untag/{id}', ['as' => 'id', 'uses' => 'EnquiriesController@untag']);

        Route::any('post', 'EnquiriesController@store');

        Route::any('remove/{id}', ['as' => 'id', 'uses' => 'EnquiriesController@remove']);

        Route::any('destroy/{id}', ['as' => 'id', 'uses' => 'EnquiriesController@destroy']);
    });

    Route::group(['prefix' => 'award'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'AwardsController@get']);

        Route::any('create', 'AwardsController@store');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'AwardsController@destroy']);
    });

    Route::group(['prefix' => 'customer'], function () {

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'CustomerController@get']);

        Route::any('create/', 'CustomerController@create');

        Route::any('search/{key}', ['as' => 'key', 'uses' => 'CustomerController@search']);

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'CustomerController@destroy']);
    });

    Route::group(['prefix' => 'product'], function () {

        Route::any('create', 'ProductsController@store');

        Route::any('get/{id}', ['as' => 'id', 'uses' => 'ProductsController@get']);

        Route::any('search/{key}', ['as' => 'key', 'uses' => 'ProductsController@search']);

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'ProductsController@destroy']);
    });

    Route::group(['prefix' => 'productimage'], function () {

        Route::any('add', 'ProductsController@addImg');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'ProductsController@destroyImg']);
    });

    Route::group(['prefix' => 'productsize'], function () {

        Route::any('add', 'ProductsController@addImg');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'ProductsController@destroySize']);
    });

    Route::any('productsRange', 'ProductsController@getRange');

    Route::group(['prefix' => 'homeslide'], function () {

        Route::any('create', 'HomeslideController@store');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'HomeslideController@destroy']);
    });

    Route::group(['prefix' => 'pdf'], function () {

        Route::any('create', 'PdfController@store');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'PdfController@destroy']);
    });

    Route::group(['prefix' => 'project'], function () {

        Route::any('create', 'ProjectsController@store');

        Route::get('retrieve/{id}', ['as' => 'id', 'uses' => 'ProjectsController@get']);

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'ProjectsController@destroy']);
    });

    Route::group(['prefix' => 'projectimage'], function () {

        Route::any('add', 'ProjectsController@addImg');

        Route::any('delete/{id}', ['as' => 'id', 'uses' => 'ProjectsController@destroyImg']);
    });

    Route::group(['prefix' => 'cart'], function () {

        Route::any('add', 'CartController@add');

        Route::any('remove/{id}', 'CartController@remove');
    });

    Route::group(['prefix' => 'contact'], function () {

        Route::any('create', 'ContactController@store');
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
