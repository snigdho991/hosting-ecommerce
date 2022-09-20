<?php
Auth::routes();
Route::group(['prefix'  =>  'admin'], function () {
 
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
 
    Route::group(['middleware' => ['auth:admin']], function () {
 
        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix' => 'profile'], function () {
 
            Route::get('/', 'Admin\ProfileController@index')->name('admin.profile.index');
            Route::post('/update', 'Admin\ProfileController@update')->name('admin.profile.update');
         });

        Route::group(['prefix'  =>   'categories'], function() {
 
            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
         
        });

        Route::group(['prefix'  =>   'pages'], function() {
 
            Route::get('/', 'Admin\PagesController@index')->name('admin.pages.index');
            Route::get('/create', 'Admin\PagesController@create')->name('admin.pages.create');
            Route::post('/store', 'Admin\PagesController@store')->name('admin.pages.store');
            Route::get('/edit/{id}', 'Admin\PagesController@edit')->name('admin.pages.edit');
            Route::post('/update', 'Admin\PagesController@update')->name('admin.pages.update');
            Route::get('/{id}/delete', 'Admin\PagesController@delete')->name('admin.pages.delete');         
        });
        
        Route::group(['prefix' => 'products'], function () {
 
            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::get('/{id}/delete', 'Admin\ProductController@delete')->name('admin.products.delete');
          
         });
         
         Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
            Route::get('/{id}/delete', 'Admin\OrderController@delete')->name('admin.orders.delete');
            Route::get('/update/{id}/status/{value}', 'Admin\OrderController@update')->name('admin.orders.update');

         });
         
         Route::group(['prefix' => 'tickets'], function () {
            Route::get('/', 'Admin\TicketsController@index')->name('admin.tickets.index');
            Route::get('/{ticket_id}/show', 'Admin\TicketsController@show')->name('admin.tickets.show');
            Route::get('/close_ticket/{ticket_id}', 'Admin\TicketsController@close')->name('admin.tickets.close');
         });
         
         Route::group(['prefix' => 'users'], function () {
 
            Route::get('/', 'Admin\UserController@index')->name('admin.users.index');
            Route::get('/create', 'Admin\UserController@create')->name('admin.users.create');
            Route::get('/{id}/show', 'Admin\UserController@show')->name('admin.users.show');
            Route::post('/store', 'Admin\UserController@store')->name('admin.users.store');
            Route::get('/edit/{id}', 'Admin\UserController@edit')->name('admin.users.edit');
            Route::post('/{id}/update', 'Admin\UserController@update')->name('admin.users.update');
            Route::get('/{id}/delete', 'Admin\UserController@delete')->name('admin.users.delete');
            Route::get('/{id}/mail', 'Admin\UserController@mail')->name('admin.users.mail');
            Route::post('/{id}/mail/submit', 'Admin\UserController@SubmitMail')->name('admin.users.sendmail');
            Route::get('/status/update', 'Admin\UserController@updateStatus')->name('admin.users.update.status');
         });
         
         Route::group(['prefix' => 'admins'], function () {
 
            Route::get('/', 'Admin\UserController@admins')->name('admin.admins.index');
            Route::get('/edit/{id}',  ['as' => 'admin.admins.edit', 'uses' => 'Admin\UserController@edit_admin']);
            Route::post('/{id}/update', 'Admin\UserController@update_admin')->name('admin.admins.update');
            Route::get('/{id}/delete', 'Admin\UserController@delete_admin')->name('admin.admins.delete');
         });

         Route::group(['prefix' => 'themes'], function () {
            Route::get('/', 'Admin\SettingController@themes')->name('admin.themes');
            Route::post('/update', 'Admin\SettingController@theme_update')->name('admin.theme.update');
        });
        
        Route::group(['prefix' => 'blogs'], function () {

            // CATEGORY
            Route::get('/categories', 'Admin\BlogCategoryController@index')->name('blog.category');
            Route::get('/category/create', 'Admin\BlogCategoryController@create')->name('blog.create.category');
            Route::post('/category/store', 'Admin\BlogCategoryController@store')->name('blog.store.category');
            Route::get('/category/edit/{slug}', 'Admin\BlogCategoryController@edit')->name('blog.edit.category');
            Route::post('/category/update', 'Admin\BlogCategoryController@update')->name('blog.update.category');
            Route::get('/category/delete/{slug}', 'Admin\BlogCategoryController@destroy')->name('blog.delete.category');


            // TAG
            Route::get('/tags', 'Admin\BlogTagController@index')->name('blog.tag');
            Route::get('/tag/create', 'Admin\BlogTagController@create')->name('blog.create.tag');
            Route::post('/tag/store', 'Admin\BlogTagController@store')->name('blog.store.tag');
            Route::get('/tag/edit/{slug}', 'Admin\BlogTagController@edit')->name('blog.edit.tag');
            Route::post('/tag/update', 'Admin\BlogTagController@update')->name('blog.update.tag');
            Route::get('/tag/delete/{slug}', 'Admin\BlogTagController@destroy')->name('blog.delete.tag');

            // POST
            Route::get('/posts', 'Admin\BlogPostController@index')->name('blog.post');
            Route::get('/post/create', 'Admin\BlogPostController@create')->name('blog.create.post');
            Route::post('/post/store', 'Admin\BlogPostController@store')->name('blog.store.post');
            Route::get('/post/trash/{slug}', 'Admin\BlogPostController@destroy')->name('blog.trash.post');
            Route::get('/posts/trashed', 'Admin\BlogPostController@trashed')->name('blog.all.trashed.post');
            Route::get('/post/restore/{slug}', 'Admin\BlogPostController@restore')->name('blog.restore.post');
            Route::get('/post/delete/{slug}', 'Admin\BlogPostController@delete')->name('blog.delete.post');
            Route::get('/post/edit/{slug}', 'Admin\BlogPostController@edit')->name('blog.edit.post');
            Route::post('/post/update/{slug}', 'Admin\BlogPostController@update')->name('blog.update.post');
        });
    });
});