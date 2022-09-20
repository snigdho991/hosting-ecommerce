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
Route::get('/', function () {
    return view('index');
});
Route::group(['prefix'  =>  'admin'], function () {
 
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
 
    Route::get('/', function () {
        return view('admin.dashboard.index');
    });
 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/aboutus', 'HomeController@aboutus')->name('aboutus');
Route::get('/domain', 'HomeController@domain')->name('domain');

// SEARCH
Route::get('/api/find/user', 'HomeController@search')->name('search');

// MESSAGING SYSTEM

Route::get('/inbox', 'HomeController@inbox')->name('inbox');
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

// END
Route::get('/settings', 'HomeController@settings')->name('settings');

Route::post('/theme/update', 'HomeController@user_theme_update')->name('user.theme.update');

Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');

Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
});

Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
Route::get('account/invoices', 'Site\AccountController@getInvoices')->name('account.invoices');

Route::get('new_ticket', 'Site\TicketsController@create');
Route::post('new_ticket', 'Site\TicketsController@store');
Route::get('my_tickets', 'Site\TicketsController@userTickets');
Route::get('tickets/{ticket_id}', 'Site\TicketsController@show');
Route::post('comment', 'Site\CommentsController@postComment');

Route::get('user',  ['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('user/edit',  ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::post('user/update',  ['as' => 'users.update', 'uses' => 'UsersController@update']);

// BLOGS
Route::get('/blogs', 'Site\BlogController@frontend_blog')->name('frontend.blog');
Route::get('/blog/{slug}', 'Site\BlogController@blog_details')->name('blog.details');
Route::get('/publish-blog', 'HomeController@publish_blog')->name('publish.blog');
Route::post('/user/blog/store', 'HomeController@store_user_blog')->name('store.user.blog');
Route::get('/my-blogs', 'HomeController@my_blogs')->name('frontend.my.blog');

/*
Route::get('/gallery', 'ImageController@photos')->name('photos');
Route::post('/image', 'ImageController@upload')->name('upload');
Route::delete('/image/{id}', 'ImageController@destroy')->name('destroy');
*/

// GALLERY
Route::get('/gallery', 'ImageController@all_images')->name('all.images');
Route::get('/my-gallery', 'HomeController@publish_gallery')->name('my.gallery.images');
Route::post('/store/gallery-images', 'HomeController@store_gallery_images')->name('store.gallery.images');
Route::get('/gallery-image/delete/{thumbnail}','HomeController@delete_gallery_image');


// PAGE
Route::get('/{page}', 'ImageController@frontend_page')->name('frontend.page');


require 'admin.php';