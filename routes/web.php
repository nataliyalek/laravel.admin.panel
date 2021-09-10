<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*** admin side ***/

Route::group(['middleware' => ['status', 'auth']], function(){
    $groupData = [
        'namespace' => 'Blog\Admin',
        'prefix' => 'admin'
    ];

    Route::group($groupData, function (){

        Route::resource('index', 'MainController')->names('blog.admin.index');
        Route::resource('orders', 'OrderController')->names('blog.admin.order');
        Route::get('/orders/change/{id}', 'OrderController@change')->name('blog.admin.order.change');
        Route::post('/orders/save/{id}', 'OrderController@save')->name('blog.admin.order.save');
        Route::get('/orders/forcedestroy/{id}', 'OrderController@forcedestroy')->name('blog.admin.order.forcedestroy');
    });
});


    //User side
    $groupeData = [
        'namespace' => 'Blog\User',
        'prefix' => 'user',
    ];
    Route::group($groupeData, function () {
        Route::resource('index', 'MainController')
            ->names('blog.user.index');
    });
    //---------

    //Disabled side - in that moment don`t work yet
    $groupeData = [
       'namespace' => 'Blog\Disabled',
        'prefix' => 'disabled',
    ];
    Route::group($groupeData, function () {
        Route::resource('index', 'MainController')
            ->names('blog.disabled.index');
    });
