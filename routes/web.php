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


Route::get('cart', 'CartController@cart')->name('cart');


Route::group(['namespace' => 'View'], function () {

    Route::get('/', 'ViewController@index')->name('index');

    Route::get('/product/{slug}', 'ViewController@product')->name('product');
    Route::get('/search', 'ViewController@search')->name('search');
    Route::get('/category/{title}', 'ViewController@category')->name('category');

    Route::get('تماس-با-ما/', 'ViewController@contactUs')->name('contactUs');
    Route::get('درباره-ما/', 'ViewController@aboutUs')->name('aboutUs');

    Route::get('blog', 'ViewController@blogs')->name('blogs');
    Route::get('blog/{slug}', 'ViewController@blog')->name('blog');

    Route::post('comments', 'ViewController@comments')->name('comments');
    Route::post('contactSubmit', 'ViewController@contactSubmit')->name('contactSubmit');

});

Route::group(['prefix' => ''], function () {

    Route::get('/cart', 'CartController@cart')->name('cart');
    Route::get('/cart/addcart/{slug}', 'CartController@addCart')->name('addCart');
//    Route::post('/cart/updateCart/{slug_product}', 'CartController@updateCart')->name('updateCart');

    Route::post('/discount', 'CartController@discount')->name('discount');

    Route::get('/cart/deletecart/{id}', 'CartController@deleteCart')->name('deleteCart');
//    Route::get('/{slug_product}', 'CartController@viewCart')->name('viewCart');
    Route::get('/cart/deleteItemCart/{id}', 'CartController@deleteItemCart')->name('deleteItemCart');
    Route::post('uploadFileCart', 'CartController@uploadFileCart')->name('uploadFileCart');

//    $this->get('/payments' , 'HomeController@payments')->name('payments');

});
Route::group(['namespace' => 'Admin', 'middleware' => ['auth:web', 'role:admin'], 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/notifications', 'AdminController@notifications')->name('admin.notifications');

//    Route::get('/contacts', 'AdminController@indexContact')->name('admin.indexContact');
//    Route::delete('/contacts/{contact}', 'AdminController@destroyContact')->name('admin.destroyContact');
//
    Route::resource('category', 'CategoryController')->except([
        'show'
    ]);

    Route::resource('banner', 'BannerController')->except([
        'show'
    ]);

    Route::resource('brand', 'BrandController')->except([
        'show'
    ]);
    Route::resource('product', 'ProductController')->except([
        'show'
    ]);


    Route::get('/{product}/addPropertyProduct', 'ProductController@addPropertyProduct')->name('addPropertyProduct');
    Route::post('/{product}/storePropertyProduct', 'ProductController@storePropertyProduct')->name('storePropertyProduct');

    Route::post('/property-product-post', 'ProductController@propertyProductPost')->name('propertyProductPost');
    Route::delete('/property-product-delete/{id}', 'ProductController@propertyProductDelete')->name('propertyProductDelete');


    Route::post('/head-property-post', 'CategoryController@headPropertyPost')->name('headPropertyPost');
    Route::delete('/head-property-delete/{id}', 'CategoryController@headPropertyDelete')->name('headPropertyDelete');
    Route::patch('/head-property-update', 'CategoryController@headPropertyUpdate')->name('headPropertyUpdate');

    Route::patch('/{product}/activeProduct', 'ProductController@activeProduct')->name('product.active');
    Route::patch('/{category}/activeCategory', 'CategoryController@activeCategory')->name('category.active');
    Route::patch('/{banner}/activeBanner', 'BannerController@activeBanner')->name('banner.active');

    Route::get('/{category}/addProperty', 'PropertyController@addProperty')->name('addProperty');
    Route::post('/{category}/storeProperty', 'PropertyController@storeProperty')->name('storeProperty');
    Route::get('/{category}/editProperty', 'PropertyController@editProperty')->name('editProperty');
    Route::patch('/{category}/updateProperty', 'PropertyController@updateProperty')->name('updateProperty');
    Route::delete('/{category}/deleteProperty', 'PropertyController@deleteProperty')->name('deleteProperty');

    Route::post('/option-property-post', 'PropertyController@optionPropertyPost')->name('optionPropertyPost');
    Route::delete('/option-property-delete/{id}', 'PropertyController@optionPropertyDelete')->name('optionPropertyDelete');
    Route::patch('/option-property-update', 'PropertyController@optionPropertyUpdate')->name('optionPropertyUpdate');


    Route::post('/uploadFile', 'ProductController@uploadFile')->name('uploadFile');

//
//    Route::get('comments/unsuccessful', 'CommentController@commentUnSuccessFull')->name('commentUnSuccessFull');
//    Route::get('comments/successful', 'CommentController@commentSuccessFull')->name('commentSuccessFull');
//    Route::get('comments/all', 'CommentController@commentAll')->name('commentAll');
//
//    Route::delete('comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
//    Route::patch('/{id}/comment', 'CommentController@approved')->name('approve.comment');
//
//    Route::get('/{id}/reply-comment', 'CommentController@getReplyCommentAdmin')->name('getReplyCommentAdmin');
//    Route::post('/{id}/post-reply-comment', 'CommentController@postReplyCommentAdmin')->name('postReplyCommentAdmin');
//
//    Route::get('comments/index', 'CommentController@index')->name('comment.index');
//
//    Route::resource('blog', 'BlogController');
//    Route::patch('/{blog}/activeBlog', 'BlogController@activeBlog')->name('blog.active');
//
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users.index');
//        Route::get('/create', 'UserController@create')->name('users.create');
//        Route::post('/store', 'UserController@store')->name('users.store');
        Route::patch('/{user}/activeUser', 'UserController@activeUser')->name('activeUser');
        Route::delete('/{user}/destroy', 'UserController@destroy')->name('users.destroy');
//        Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
//        Route::patch('/{user}/update', 'UserController@update')->name('user.update');
        Route::get('/{user}/resetPassword', 'UserController@showResetForm')->name('users.resetPassword');
        Route::patch('/{user}/updatePassword', 'UserController@updatePassword')->name('users.updatePassword');

    });


});
Route::group(['namespace' => 'Panel', 'middleware' => ['auth:web', 'role:seller'], 'prefix' => 'panel'], function () {


    Route::get('/dashboard', 'DashboardController@index')->name('panel.dashboard');
    Route::get('/notifications', 'DashboardController@notifications')->name('panel.notifications');

    //send ticket

//    Route::post('/edit-profile', 'ProfileController@editProfileStore')->name('editProfileStore');

});


Route::group(['namespace' => 'User', 'middleware' => ['auth:web'], 'prefix' => 'panel'], function () {

    Route::get('/panelUser', 'UserController@panelUser')->name('panelUser');

    Route::get('increaseCredit', 'UserController@increaseCredit')->name('increaseCredit');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('favoriteProduct', 'UserController@favoriteProduct')->name('favoriteProduct');
    Route::get('discountCode', 'UserController@discountCode')->name('discountCode');
    Route::get('financialReport', 'UserController@financialReport')->name('financialReport');
    Route::get('orderList', 'UserController@orderList')->name('orderList');
    Route::get('/address', 'UserController@address')->name('address');

//    Route::get('/dashboard', 'DashboardController@index')->name('panel.dashboard');
//    Route::get('/notifications', 'DashboardController@notifications')->name('panel.notifications');

    //send ticket

//    Route::post('/edit-profile', 'ProfileController@editProfileStore')->name('editProfileStore');

});


//Route::get('/getFileTicket/{filename}', 'Panel\TicketController@getFileTicket')->name('getFileTicket');

Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...

    Route::post('get-mobile', 'RegisterController@getMobile')->name('getMobile');
    Route::post('verify', 'RegisterController@postVerify')->name('postVerify');
    Route::post('repeatVerify', 'RegisterController@repeatVerify')->name('repeatVerify');

    Route::get('showResetForm', 'ResetPasswordController@showResetForm')->name('showResetForm');
    Route::post('resetPasswordUser', 'ResetPasswordController@resetPasswordUser')->name('resetPasswordUser');

    Route::get('login', 'LoginController@showLoginForm')->name('login');

    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'RegisterController@register');

});


