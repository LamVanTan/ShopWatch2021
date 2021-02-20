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
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');

// Route::prefix('/public')->middleware('auth')->group(function(){
Route::get('','Watch\IndexController@index')->name('watch.index.index');

Route::post('/shopAll','Watch\IndexController@shopAll')->name('watch.index.shopAll');

Route::get('/{slug}-{id}','Watch\ProductsController@products')->name('watch.watch.products');

Route::get('/{slug}-{id}.html','Watch\ProductsController@single')->name('watch.watch.single');

Route::get('/contact','Watch\ContactController@contact')->name('watch.contact.contact');

Route::post('/contact','Watch\ContactController@postcontact')->name('watch.contact.contact');

Route::get('/about','Watch\AboutController@about')->name('watch.about.about');

Route::get('/cart','Watch\CartController@cart')->name('watch.watch.cart');

Route::post('/cart','Watch\CartController@addCart')->name('watch.watch.add-cart');

Route::post('/remove','Watch\CartController@removeCart')->name('watch.watch.remove-ajax');

Route::post('/changeQty','Watch\CartController@changeQty')->name('watch.watch.changeQty-ajax');

Route::get('/checkout','Watch\ProductsController@checkout')->name('watch.watch.checkout')->middleware('auth');

Route::get('/purchase_menu','Watch\ProductsController@purchase_menu')->name('watch.watch.purchase_menu')->middleware('auth');

Route::post('/purchase_menu','Watch\ProductsController@checkoutCustomer')->name('ajax-status-checkoutCustomer')->middleware('auth');

Route::get('/status','Watch\ProductsController@status')->name('ajax-status-time')->middleware('auth');


Route::post('/checkout','Watch\ProductsController@postcheckout')->name('watch.watch.checkout');

//payment vnpay
Route::post('/payment','Watch\ProductsController@payment')->name('watch.checkout.payment');
//payment vnpay
Route::get('/payment','Watch\ProductsController@getpayment')->name('payment-vnpay');


Route::post('/discount','Watch\ProductsController@discount')->name('watch.watch.discount');

Route::post('/search','Watch\ProductsController@search')->name('watch.watch.search');



Route::prefix('/auth')->group(function(){
//public 
	Route::get('/login','Auth\AuthController@login')
	->name('watch.auth.login');

	Route::post('/login','Auth\AuthController@postLogin')
	->name('watch.auth.login');

	Route::post('/Forgot_password','Auth\AuthController@Forgot_password')
	->name('watch.auth.Forgot_password');

	 Route::get('/register','Auth\AuthController@register')
	 ->name('watch.auth.register');

	Route::post('/register','Auth\AuthController@postRegister')
	->name('watch.auth.register');	
	Route::get('/logout', 'Auth\AuthController@logout')->name('watch.auth.logout');



	//admin
	Route::get('/loginAdmin', 'Auth\AuthController@loginAdmin')->name('auth.auth.login');
	Route::post('/loginAdmin', 'Auth\AuthController@postloginAdmin')->name('auth.auth.login');

	Route::get('/logoutAdmin', 'Auth\AuthController@logoutAdmin')->name('auth.auth.logout');
});



//admin
Route::prefix('/admin')->middleware('role')->group(function(){

	Route::get('', 'Admin\AdminIndexController@index')->name('admin.index.index');

	// quan li danh mục
	Route::prefix('/category')->group(function(){
		Route::get('/index', 'Admin\AdminCategoryController@index')->name('admin.category.index');
		Route::get('/add', 'Admin\AdminCategoryController@add')->name('admin.category.add');
		Route::post('/add', 'Admin\AdminCategoryController@postadd')->name('admin.category.add');
		Route::get('/edit/{id}', 'Admin\AdminCategoryController@edit')->name('admin.category.edit');
		Route::post('/edit/{id}', 'Admin\AdminCategoryController@postedit')->name('admin.category.edit');	
		Route::get('/delete/{id}', 'Admin\AdminCategoryController@del')->name('admin.category.delete');
		Route::post('/ajax-status-post', 'Admin\AdminCategoryController@ajax_status_post')->name('ajax-status-post');
	});

	//quan chiết khấu giảm giá
	Route::prefix('/sale')->group(function(){
		Route::get('/index', 'Admin\AdminSaleController@index')->name('admin.sale.index');
		Route::get('/add', 'Admin\AdminSaleController@add')->name('admin.sale.add');
		Route::post('/add', 'Admin\AdminSaleController@postadd')->name('admin.sale.add');
		Route::get('/edit/{sale_id}', 'Admin\AdminSaleController@edit')->name('admin.sale.edit');
		Route::post('/edit/{sale_id}', 'Admin\AdminSaleController@postedit')->name('admin.sale.edit');
		Route::get('/delete/{sale_id}', 'Admin\AdminSaleController@delete')->name('admin.sale.delete');
		
	});

	//SAN PHAM
	Route::prefix('/products')->group(function(){
		Route::get('/index', 'Admin\AdminProductsController@index')->name('admin.products.index');
		Route::get('/add', 'Admin\AdminProductsController@add')->name('admin.products.add');
		Route::post('/add', 'Admin\AdminProductsController@postadd')->name('admin.products.add');
		Route::get('/edit/{id}', 'Admin\AdminProductsController@edit')->name('admin.products.edit');
		Route::post('/edit/{id}', 'Admin\AdminProductsController@postedit')->name('admin.products.edit');	
		Route::get('/delete/{id}', 'Admin\AdminProductsController@delete')->name('admin.products.delete');
		Route::post('/ajax-status-products', 'Admin\AdminProductsController@ajax_status_products')->name('ajax-status-products');

		Route::post('/editpicture/{idPic}', 'Admin\AdminProductsController@editpicture')->name('admin.products.editpicture');
		Route::get('/deletepicture/{idPic}', 'Admin\AdminProductsController@deletepicture')->name('admin.products.deletepicture');
	});


	//quan ly user
	Route::prefix('/user')->middleware('check')->group(function(){
		Route::get('/index','Admin\AdminUserController@index')->name('admin.users.index');
		Route::get('/add','Admin\AdminUserController@add')->name('admin.users.add');
		Route::post('/add' , 'Admin\AdminUserController@postadd')->name('admin.users.add');
		Route::get('/edit/{id}', 'Admin\AdminUserController@edit')->name('admin.users.edit');
		Route::post('/edit/{id}','Admin\AdminUserController@postedit')->name('admin.users.edit');
		Route::get('/delete/{id}','Admin\AdminUserController@delete')->name('admin.users.delete');		
	});
	
	
	Route::prefix('/checkout')->group(function(){
		Route::get('/index', 'Admin\AdminCheckoutController@index')->name('admin.checkout.index');
		Route::post('ajax-checkout', 'Admin\AdminCheckoutController@ajaxcheckout')->name('ajax-status-checkout');	

		Route::get('/status-checkout', 'Admin\AdminCheckoutController@status')->name('ajax-status');
	});
	
});
