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


Route::get('/', [

    'uses' => 'WelcomeController@index',
    'as' => '/'
    ]);
Route::get('/category-product/{id}', [

    'uses' => 'WelcomeController@categoryProduct',
    'as' => 'category-product'
    ]);
Route::get('/product-details/{id}/{name}', [

    'uses' => 'WelcomeController@productDetails',
    'as' => 'product-details'
    ]);
Route::post('/add/cart', [

    'uses' => 'CartController@addToCart',
    'as' => 'add-cart'
    ]);
Route::get('/show/cart', [

    'uses' => 'CartController@showCart',
    'as' => 'show-cart'
    ]);
Route::get('cart-item-delete/{id}', [

    'uses' => 'CartController@deleteCart',
    'as' => 'cart-item-delete'
    ]);
Route::post('update-cart', [

    'uses' => 'CartController@updateCart',
    'as' => 'update-cart'
    ]);
Route::get('checkout', [

    'uses' => 'CheckoutController@index',
    'as' => 'checkout'
    ]);
Route::post('customer-sign-up', [

    'uses' => 'CheckoutController@customerSignUp',
    'as' => 'customer-sign-up'
    ]);
Route::post('customer/login/check', [

    'uses' => 'CheckoutController@customerLoginCheck',
    'as' => 'customer-login'
]);
Route::post('customer/logout', [

    'uses' => 'CheckoutController@customerLogout',
    'as' => 'customer-logout'
]);
Route::get('new-customer-login', [

    'uses' => 'CheckoutController@newCustomerLogin',
    'as' => 'new-customer-login'
]);
Route::get('/checkout/shipping', [

    'uses' => 'CheckoutController@shippingForm',
    'as' => 'checkout-shipping'
    ]);
Route::post('/shipping/save', [

    'uses' => 'CheckoutController@saveshippingInfo',
    'as' => 'new-shipping'
    ]);
Route::get('/checkout/payment', [

    'uses' => 'CheckoutController@paymentForm',
    'as' => 'checkout-payment'
    ]);
Route::post('/checkout/order', [

    'uses' => 'CheckoutController@newOrder',
    'as' => 'new-order'
    ]);
Route::post('/complete/order', [

    'uses' => 'CheckoutController@completeOrder',
    'as' => 'complete-order'
    ]);
Route::get('/dashboard', [

    'uses' => 'HomeController@index',
    'as' => 'dashboard'
    ]);
Route::get('add-category', [

    'uses' => 'CategoryController@addCategory',
    'as' => 'add-category'
    ]);

Route::post('/category/save', [

    'uses' => 'CategoryController@saveCategory',
    'as' => 'new-category'
    ]);

Route::get('manage-category', [

    'uses' => 'CategoryController@manageCategory',
    'as' => 'manage-category'
    ]);
Route::get('/category/unpublished/{id}', [

    'uses' => 'CategoryController@unpublishedCategory',
    'as' => 'unpublished_category'
    ]);
Route::get('/category/published/{id}', [

    'uses' => 'CategoryController@publishedCategory',
    'as' => 'published_category'
    ]);
Route::get('/category/edit/{id}', [

    'uses' => 'CategoryController@editCategory',
    'as' => 'edit_category'
    ]);
Route::post('/category/update', [

    'uses' => 'CategoryController@updateCategory',
    'as' => 'update-category'
    ]);
Route::get('/category/delete/{id}', [

    'uses' => 'CategoryController@deleteCategory',
    'as' => 'delete_category'
    ]);
Route::get('add-brand', [

    'uses' => 'BrandController@addBrand',
    'as' => 'add-brand'
    ]);
Route::get('manage-brand', [

    'uses' => 'BrandController@manageBrand',
    'as' => 'manage-brand'
    ]);
Route::post('/brand/save', [

    'uses' => 'BrandController@saveBrand',
    'as' => 'new-brand'
    ]);
Route::get('unpublished_brand/{id}', [

    'uses' => 'BrandController@unpublishedBrand',
    'as' => 'unpublished_brand'
    ]);
Route::get('published_brand/{id}', [

    'uses' => 'BrandController@publishedBrand',
    'as' => 'published_brand'
    ]);
Route::get('edit_brand/{id}', [

    'uses' => 'BrandController@editdBrand',
    'as' => 'edit_brand'
    ]);
Route::post('update-brand', [

    'uses' => 'BrandController@updatedBrand',
    'as' => 'update-brand'
    ]);
Route::get('delete_brand/{id}', [

    'uses' => 'BrandController@deleteBrand',
    'as' => 'delete_brand'
    ]);
Route::get('add-product', [

    'uses' => 'ProductController@addProduct',
    'as' => 'add-product'
    ]);
Route::get('manage-product', [

    'uses' => 'ProductController@manageProduct',
    'as' => 'manage-product'
    ]);
Route::post('new-product', [

    'uses' => 'ProductController@saveProduct',
    'as' => 'new-product'
    ]);
Route::get('unpublished_productt/{id}', [

    'uses' => 'ProductController@unpublishedProduct',
    'as' => 'unpublished_product'
    ]);
Route::get('published_product/{id}', [

    'uses' => 'ProductController@publishedProduct',
    'as' => 'published_product'
    ]);
Route::get('edit_product/{id}', [

    'uses' => 'ProductController@editProduct',
    'as' => 'edit_product'
    ]);
Route::post('update-product', [

    'uses' => 'ProductController@updateProduct',
    'as' => 'update-product'
    ]);
Route::get('delete_product/{id}', [

    'uses' => 'ProductController@deleteProduct',
    'as' => 'delete_product'
    ]);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
