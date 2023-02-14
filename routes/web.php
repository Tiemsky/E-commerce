<?php

use App\Facades\Uploader;
use Illuminate\Support\Facades\Route;


/*
 * Grouping Home Controller Concern
*/

Route::controller('App\Http\Controllers\HomeController')->group(function(){
    //auth & user
// Auth::routes(['verify' => true]);
    Route::get('/home', 'index')->name('home');
    Route::get('/password-change', 'changePassword')->name('password.change');
    Route::post('/password-update', 'updatePassword')->name('password.update');
    Route::get('/user/logout', 'Logout')->name('user.logout');
});

// Socialite Route
Route::controller('App\Http\Controllers\SocialController')->group(function(){
    Route::get('/auth/redirect/{provider}', 'redirect');
    Route::get('/callback/{provider}', 'callback');
});


Route::get('/', function () {return view('pages.index');});


//admin=======
Route::middleware(['auth','admin'])->controller('App\Http\Controllers\AdminController')->group(function(){
    Route::get('admin/home', 'index')->name('admin.dashboard');
    Route::get('/admin/Change/Password','ChangePassword')->name('admin.password.change');
    Route::post('/admin/password/update','Update_pass')->name('admin.password.update'); 
    Route::get('admin/logout', 'logout')->name('admin.logout');
});

    /// Admin Section 
// categories 
Route::middleware(['auth','admin'])
        ->resource('admin/category','App\Http\Controllers\Admin\Category\CategoryController')
        ->except(['create','show','edit']);
Route::middleware(['auth','admin'])
        ->get('admin/category/{slug}/edit',[App\Http\Controllers\Admin\Category\CategoryController::class,'edit'])
        ->name('category.edit');


/// Marques
Route::middleware(['auth','admin'])
        ->resource('admin/brand','App\Http\Controllers\Admin\BrandController')
        ->except(['create','show','edit']);
        Route::middleware(['auth','admin'])
        ->get('admin/brand/{slug}/edit',[App\Http\Controllers\Admin\BrandController::class,'edit'])
        ->name('brand.edit');
        

// Sous Categories
Route::get('admin/sub/category', 'App\Http\Controllers\Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'App\Http\Controllers\Admin\Category\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'App\Http\Controllers\Admin\Category\SubCategoryController@DeleteSubcat');
Route::get('edit/subcategory/{id}', 'App\Http\Controllers\Admin\Category\SubCategoryController@EditSubcat');
Route::post('update/subcategory/{id}', 'App\Http\Controllers\Admin\Category\SubCategoryController@UpdateSubcat');




// Coupons All 
Route::get('admin/sub/coupon', 'App\Http\Controllers\Admin\Category\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'App\Http\Controllers\Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'App\Http\Controllers\Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'App\Http\Controllers\Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'App\Http\Controllers\Admin\Category\CouponController@UpdateCoupon');

// Newsletter
Route::get('admin/newsletter', 'App\Http\Controllers\Admin\Category\CouponController@Newsletter')->name('admin.newsletter');
Route::get('delete/sub/{id}', 'App\Http\Controllers\Admin\Category\CouponController@DeleteSub');

// For Show Sub category with ajax
Route::get('get/subcategory/{category_id}', 'App\Http\Controllers\Admin\ProductController@GetSubcat');

// Product All Route
Route::middleware(['auth','admin'])
        ->resource('admin/product', 'App\Http\Controllers\Admin\ProductController')
        ->except(['edit','show']);
Route::middleware(['auth','admin'])
        ->get('admin/product/{id}/{slug}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])
        ->name('product.edit');
Route::middleware(['auth','admin'])
->get('admin/product/{id}/{slug}/show', [App\Http\Controllers\Admin\ProductController::class, 'show'])
->name('product.show');

Route::get('inactive/product/{id}', 'App\Http\Controllers\Admin\ProductController@inactive');
Route::get('active/product/{id}', 'App\Http\Controllers\Admin\ProductController@active');
Route::get('delete/product/{id}', 'App\Http\Controllers\Admin\ProductController@DeleteProduct');

Route::get('view/product/{id}', 'App\Http\Controllers\Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}', 'App\Http\Controllers\Admin\ProductController@EditProduct');

Route::post('update/product/withoutphoto/{id}', 'App\Http\Controllers\Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}', 'App\Http\Controllers\Admin\ProductController@UpdateProductPhoto');

// Blog Admin All

Route::get('blog/category/list', 'App\Http\Controllers\Admin\PostController@BlogCatList')->name('add.blog.categorylist');
Route::post('admin/store/blog', 'App\Http\Controllers\Admin\PostController@BlogCatStore')->name('store.blog.category');
Route::get('delete/blogcategory/{id}', 'App\Http\Controllers\Admin\PostController@DeleteBlogCat');
Route::get('edit/blogcategory/{id}', 'App\Http\Controllers\Admin\PostController@EditBlogCat');
Route::post('update/blog/category/{id}', 'App\Http\Controllers\Admin\PostController@UpdateBlogCat');

Route::get('admin/add/post', 'App\Http\Controllers\Admin\PostController@Create')->name('add.blogpost');
Route::get('admin/all/post', 'App\Http\Controllers\Admin\PostController@index')->name('all.blogpost');

Route::post('admin/store/post', 'App\Http\Controllers\Admin\PostController@store')->name('store.post');
Route::get('delete/post/{id}', 'App\Http\Controllers\Admin\PostController@DeletePost');
Route::get('edit/post/{id}', 'App\Http\Controllers\Admin\PostController@EditPost');
Route::post('update/post/{id}', 'App\Http\Controllers\Admin\PostController@UpdatePost');


// Frontend All Routes
Route::post('store/newsletter', 'App\Http\Controllers\FrontController@StoreNewsletter')->name('store.newsletter');

// ADD Wishlist

Route::get('add/wishlist/{id}', 'App\Http\Controllers\WishlistController@addWishlist');

// Add to Cart Route 
Route::get('add/to/cart/{id}', 'App\Http\Controllers\CartController@AddCart');
Route::get('check', 'App\Http\Controllers\CartController@check');

Route::get('product/cart', 'App\Http\Controllers\CartController@ShowCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'App\Http\Controllers\CartController@removeCart');
Route::post('update/cart/item/', 'App\Http\Controllers\CartController@UpdateCart')->name('update.cartitem');

Route::get('/cart/product/view/{id}', 'App\Http\Controllers\CartController@ViewProduct');
Route::post('insert/into/cart/', 'App\Http\Controllers\CartController@insertCart')->name('insert.into.cart');

Route::get('user/checkout/', 'App\Http\Controllers\CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/', 'App\Http\Controllers\CartController@wishlist')->name('user.wishlist');

Route::post('user/apply/coupon/', 'App\Http\Controllers\CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/', 'App\Http\Controllers\CartController@CouponRemove')->name('coupon.remove');

Route::get('/product/details/{id}/{product_name}', 'App\Http\Controllers\ProductController@ProductView');
Route::post('/cart/product/add/{id}', 'App\Http\Controllers\ProductController@AddCart');

/// Blog Post Route 

Route::get('blog/post/', 'App\Http\Controllers\BlogController@blog')->name('blog.post');

Route::get('language/english', 'App\Http\Controllers\BlogController@English')->name('language.english');
Route::get('language/french', 'App\Http\Controllers\BlogController@French')->name('language.french');

Route::get('blog/single/{id}', 'App\Http\Controllers\BlogController@BlogSingle');

// Payment Step
Route::get('payment/page', 'App\Http\Controllers\CartController@PaymentPage')->name('payment.step');

Route::post('user/payment/process/', 'App\Http\Controllers\PaymentController@Payment')->name('payment.process');
Route::post('user/stripe/charge/', 'App\Http\Controllers\PaymentController@StripeCharge')->name('stripe.charge');
Route::post('user/oncash/charge/', 'App\Http\Controllers\PaymentController@Oncash')->name('oncash.charge');


// Product details Page 
Route::get('products/{id}', 'App\Http\Controllers\ProductController@ProductsView');
Route::get('allcategory/{id}', 'App\Http\Controllers\ProductController@CategoryView');

// Admin Order Route

Route::get('admin/pending/order', 'App\Http\Controllers\Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'App\Http\Controllers\Admin\OrderController@ViewOrder');

Route::get('admin/payment/accept/{id}', 'App\Http\Controllers\Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'App\Http\Controllers\Admin\OrderController@PaymentCancel');

Route::get('admin/accept/payment', 'App\Http\Controllers\Admin\OrderController@AcceptPayment')->name('admin.accept.payment');
Route::get('admin/cancel/order', 'App\Http\Controllers\Admin\OrderController@CancelOrder')->name('admin.cancel.order');
Route::get('admin/process/payment', 'App\Http\Controllers\Admin\OrderController@ProcessPayment')->name('admin.process.payment');
Route::get('admin/success/payment', 'App\Http\Controllers\Admin\OrderController@SuccessPayment')->name('admin.success.payment');

Route::get('admin/delivery/process/{id}', 'App\Http\Controllers\Admin\OrderController@DeleveryProcess');
Route::get('admin/delivery/done/{id}', 'App\Http\Controllers\Admin\OrderController@DeleveryDone');

/// SEO Setting Route
Route::get('admin/seo', 'App\Http\Controllers\Admin\OrderController@seo')->name('admin.seo');
Route::post('admin/seo/update', 'App\Http\Controllers\Admin\OrderController@UpdateSeo')->name('update.seo');

// Order Tracking Route
Route::post('order/tracking', 'App\Http\Controllers\FrontController@OrderTracking')->name('order.tracking');

// Order Report Routes 

Route::get('admin/today/order', 'App\Http\Controllers\Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/delivery', 'App\Http\Controllers\Admin\ReportController@TodayDelivery')->name('today.delivery');

Route::get('admin/this/month', 'App\Http\Controllers\Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'App\Http\Controllers\Admin\ReportController@Search')->name('search.report');

Route::post('admin/search/by/year', 'App\Http\Controllers\Admin\ReportController@SearchByYear')->name('search.by.year');
Route::post('admin/search/by/month', 'App\Http\Controllers\Admin\ReportController@SearchByMonth')->name('search.by.month');
Route::post('admin/search/by/date', 'App\Http\Controllers\Admin\ReportController@SearchByDate')->name('search.by.date');

// Admin Role Routes 

Route::get('admin/all/user', 'App\Http\Controllers\Admin\UserRoleController@UserRole')->name('admin.all.user');
Route::get('admin/create/admin', 'App\Http\Controllers\Admin\UserRoleController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'App\Http\Controllers\Admin\UserRoleController@UserStore')->name('store.admin');

Route::get('delete/admin/{id}', 'App\Http\Controllers\Admin\UserRoleController@UserDelete');
Route::get('edit/admin/{id}', 'App\Http\Controllers\Admin\UserRoleController@UserEdit');
Route::post('admin/update/admin', 'App\Http\Controllers\Admin\UserRoleController@UserUpdate')->name('update.admin');

// Admin Site Setting Route 
Route::get('admin/site/setting', 'App\Http\Controllers\Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/sitesetting', 'App\Http\Controllers\Admin\SettingController@UpdateSiteSetting')->name('update.sitesetting');

// Return Order Route

Route::get('success/list/', 'App\Http\Controllers\PaymentController@SuccessList')->name('success.orderlist');
Route::get('request/return/{id}', 'App\Http\Controllers\PaymentController@RequestReturn');

Route::get('admin/return/request/', 'App\Http\Controllers\Admin\ReturnController@ReturnRequest')->name('admin.return.request');
Route::get('admin/approve/return/{id}', 'App\Http\Controllers\Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return/', 'App\Http\Controllers\Admin\ReturnController@AllReturn')->name('admin.all.return');

// Order Stock Route 
Route::get('admin/product/stock', 'App\Http\Controllers\Admin\UserRoleController@ProductStock')->name('admin.product.stock');

/// Contact page Routes

Route::get('contact/page', 'App\Http\Controllers\ContactController@Contact')->name('contact.page');
Route::post('contact/form', 'App\Http\Controllers\ContactController@ContactForm')->name('contact.form');
Route::get('admin/all/message', 'App\Http\Controllers\ContactController@AllMessage')->name('all.message');
Route::get('admin/delete/message/{id}', 'App\Http\Controllers\ContactController@MessageDelete');
Route::get('admin/view/message/{id}', 'App\Http\Controllers\ContactController@ViewMessage');

// Search Route
Route::post('product/search', 'App\Http\Controllers\CartController@Search')->name('product.search');
