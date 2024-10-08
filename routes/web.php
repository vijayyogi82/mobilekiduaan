<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\VendorAdminController;
use App\Http\Controllers\Admin\TourcategoryController;
use App\Http\Controllers\Admin\TourdetailsController;
use App\Http\Controllers\Admin\SocialmediaController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Artisan;

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

//user  
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('user.index');
    Route::get('/vendor', 'vendor')->name('user.vendor');
    Route::get('/contact', 'contact')->name('user.contact');
    Route::post('/contact-save', 'contactSave')->name('user.contactSave');
    Route::any('/product-categories/{category_name}', 'productCategories')->name('user.productCategories');
    // Route::get('product-categories/{category}', 'productFilter')->name('user.productFilter');
    Route::get('/{name}', 'vendorDetail')->name('user.vendorDetail');
    Route::get('/product/{name}/{id}', 'product')->name('user.product');
    Route::get('user/login', 'login')->name('login');
    Route::get('user/logout', 'logout')->name('logout');
    Route::post('user/loginchange', 'loginchange')->name('loginchange');
    Route::post('register', 'register')->name('register');
    Route::get('user/vendor-register', 'vendorRegister')->name('vendorRegister');
    Route::post('save-password', 'savePassword')->name('savePassword');

    Route::get('user/vendor-gst-validate', 'vendorGSTValidate')->name('vendorGSTValidate');
    Route::any('user/sms-otp-check', 'smsOtpCheck')->name('user.smsOtpCheck');
    Route::any('user/sms-otp-resend', 'smsOtpResend')->name('user.smsOtpResend');

    Route::Any('user/vendor-gst-validate-request-id', 'vendorGSTValidateRequestID')->name('vendorGSTValidateRequestID');
    

    // visitor
    Route::post('user/visiter-save', 'visiterSave')->name('user.visiterSave');
    Route::post('/visitor/otp-check', 'visitorOtpCheck')->name('user.visitorOtpCheck');
    Route::post('/visitor/otp-resend', 'visitorOtpResend')->name('user.visitorOtpResend');

    Route::post('user/order-now-save', 'orderNowSave')->name('user.orderNowSave');
    Route::any('/order/otp-check', 'orderOtpCheck')->name('user.orderOtpCheck');
    Route::post('/order/otp-resend', 'orderOtpResend')->name('user.orderOtpResend');
    

    Route::get('user/visitor', 'visitor')->name('user.visitor');

    Route::post('user/subscription', 'Subscription')->name('subscription');

    Route::get('user/register', 'userRegister')->name('user.register');

    Route::post('search', 'search')->name('search');

    // Route::post('products', 'searchBySubmit')->name('search.submit');
    Route::any('products/{category}', 'searchBySubmit')->name('search.submit');

    Route::get('user/sharch-price', 'sharchPrice')->name('user.sharchPrice');

    Route::get('user/wishlist', 'wishlist')->name('wishlist');
    Route::post('user/wishlist-save', 'wishlistSave')->name('wishlist.save');

    Route::get('user/cookie-policy', 'cookiePolicy')->name('cookie_policy');
    Route::get('user/terms-and-conditions', 'termsAndConditions')->name('terms_and_conditions');
    Route::get('user/terms-and-conditions-vendor', 'termsAndConditionsVendor')->name('terms_and_conditions_vendor');

    

    Route::get('trending', 'trending')->name('trending');

    // Accessory
    Route::Any('accessory/{name}/{id}', 'assessries')->name('vendor.assessries');
    Route::Any('accessory-categories/{category_name}', 'mobileAssessries')->name('vendor.mobileAssessries');
    Route::Any('user/whatsapp-otp', 'whatsappSendOTP')->name('user.whatsappSendOTP');

    // blog page
    Route::Any('user/blog', 'blog')->name('user.blog');
    // Route::Any('user/blog-detail/{id}', 'blog_detail')->name('user.blog.detail');
    Route::Any('/blog/{title}/{id}', 'blog_detail')->name('user.blog.detail');
});

// forget password
Route::controller(ForgotPasswordController::class)->group(function(){
    Route::get('user/forget-password', 'forgetPassword')->name('user.forget_password');
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});

//verdor
Route::middleware(['vendor'])->group(function () {
  Route::prefix('vendor')->group(function () {
      Route::controller(VendorController::class)->group(function(){
        Route::get('dashboard', 'dashboard')->name('vendor.dashboard');
        Route::get('account', 'account')->name('vendor.account');

        // banner
        Route::get('banner-create', 'bannerCreate')->name('vendor.bannerCreate');
        Route::any('banner-save', 'bannerSave')->name('vendor.bannerSave');
        Route::Any('banner-delete/{id}', 'bannerDelete')->name('vendor.bannerDelete');

        // new mobiles
        Route::get('new-mobiles', 'mobileIndex')->name('vendor.mobileIndex');
        Route::get('mobile', 'mobile')->name('vendor.mobile');
        Route::get('mobile/edit/{id}', 'mobileEdit')->name('vendor.mobile.edit');
        Route::post('mobile/update/{id}', 'mobileUpdate')->name('vendor.mobile.update');
        Route::post('mobile-delete/{id}', 'mobileDelete')->name('vendor.mobile.delete');


        // Bulk mobile
        Route::get('bulk-mobile-add', 'bulk_mobiles_add')->name('vendor.bulk.mobiles.add');
        Route::post('bulk-mobile-save', 'bulk_mobiles_save')->name('vendor.bulk.mobile.save');
        Route::get('bulk-mobile-model-search', 'bulk_mobile_model_search')->name('vendor.bulk.mobile.model.search');

        // Bulk refurbnished mobile
        Route::get('refurbnished-bulk-mobile-add', 'refurbnished_bulk_mobiles_add')->name('vendor.refurbnished.bulk.mobiles.add');
        Route::post('refurbnished-bulk-mobile-save', 'refurbnished_bulk_mobiles_save')->name('vendor.refurbnished.bulk.mobile.save');
        Route::get('refurbnished-bulk-mobile-model-search', 'refurbnished_bulk_mobile_model_search')->name('vendor.refurbnished.bulk.mobile.model.search');


        // refurnished  mobiles
        Route::get('refurbished-mobiles', 'refurbishedMbile')->name('vendor.refurbished_mobile');
        Route::get('used-mobile', 'usedMobile')->name('vendor.used.mobile');
        Route::get('refurbished-mobile/edit/{id}', 'refurbishedMobileEdit')->name('vendor.refurbished_mobile.edit');
        Route::post('refurbished-mobile/update/{id}', 'refurbishedMobileUpdate')->name('vendor.refurbished_mobile.update');
        Route::post('refurbished-mobile-delete/{id}', 'refurbishedMobileDelete')->name('vendor.refurbished_mobile.delete');

        // view products
        Route::get('view-products', 'viewProducts')->name('vendor.view_products');

        Route::get('change-password', 'changePassword')->name('vendor.changePassword');
        Route::post('account-save', 'accountSave')->name('vendor.account.save');
        Route::get('mobile-model-search', 'mobileModelSearch')->name('vendor.mobileModelSearch');
        Route::get('mobile-model-search-refurbnished', 'mobileModelSearchRefurbnished')->name('vendor.mobileModelSearchRefurbnished');
        Route::get('moblie-data', 'moblieData')->name('vendor.moblieData');
        Route::get('refurbnished-moblie-data', 'RefurbnishedmoblieData')->name('vendor.RefurbnishedmoblieData');

        
        Route::get('moblie-data-edit', 'moblieDataEdit')->name('vendor.moblieDataEdit');
       
        Route::post('change-password-update', 'changePasswordUpdate')->name('vendor.change_password.update');
        Route::get('vendor/delete-image', 'vendor_delete_image')->name('admin.vendor.delete_image');

        Route::post('mobile-save', 'mobileSave')->name('vendor.mobile.save');

        // Accessories
        Route::get('accessories', 'accessories')->name('vendor.accessories');
        Route::get('accessories-create', 'accessoriesCreate')->name('vendor.accessoriesCreate');
        Route::get('accessories-get-type', 'accessoriesGetType')->name('vendor.accessoriesGetType');
        Route::get('accessories-get-brand', 'accessoriesGetBrand')->name('vendor.accessoriesGetBrand');
        Route::get('accessories-get-model', 'accessoriesGetModel')->name('vendor.accessoriesGetModel');
        Route::post('accessories-save', 'accessoriesSave')->name('vendor.accessoriesSave');
        Route::Any('accessories-edit/{id}', 'accessoriesEdit')->name('vendor.accessoriesEdit');
        Route::Any('accessories-update/{id}', 'accessoriesUpdate')->name('vendor.accessoriesUpdate');
         


      });
  });
});


//admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    // login
    Route::controller(LoginController::class)->group(function(){
        Route::get('login', 'index')->name('admin.login');
        Route::post('login', 'admin_login')->name('adminlogin');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // admin logout
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::resource('vendors', VendorAdminController::class); // vendors
        Route::get('vendor/delete/{id}', [VendorAdminController::class,'vendor_delete'])->name('admin.vendor.delete');
        Route::get('update_status/{id}', [VendorAdminController::class, 'update_status'])->name('vendor.update_status');
        Route::get('vendors/{id}/password', [VendorAdminController::class, 'vendor_password'])->name('vendor.password');
        Route::post('vendor/update-password/{id}', [VendorAdminController::class, 'vendor_update_password'])->name('vendor.update_password');
        
        Route::get('vendor/mobile/count', [VendorAdminController::class, 'vendor_mobile_count'])->name('vendor.mobile.count');

        Route::controller(TourcategoryController::class)->group(function(){
        Route::match(['post', 'get'], 'tourcategory/delete/{id}', 'delete')->name('tourcategory.delete');
        Route::get('tourcategory/update_status/{id}', 'update_status')->name('tourcategory.update_status');
        });

        // tour location
        Route::resource('tourlocation', VendorAdminController::class);
        
        // tour details
        Route::resource('tourdetail', TourdetailsController::class);
        Route::controller(TourdetailsController::class)->group(function(){
        Route::match(['post', 'get'], 'tourdetail/delete/{id}', 'delete')->name('tourdetail.delete');
        Route::get('tourdetails/update_status_popular/{id}', 'update_status_popular')->name('tourdetails.update_status_popular');
        Route::get('tourdetails/update_status_top_adventures/{id}', 'update_status_top_adventures')->name('tourdetails.update_status_top_adventures');
        Route::get('tourdetails/update_status_featured/{id}', 'update_status_featured')->name('tourdetails.update_status_featured');
        });

        // social media
        Route::resource('socialmedia', SocialmediaController::class);
        Route::match(['post', 'get'], 'socialmedia/delete/{id}', [SocialmediaController::class, 'delete'])->name('socialmedia.delete');

        // banner
        Route::resource('homes', HomepageController::class);

        Route::get('banner/setting', [HomepageController::class,'banner_setting'])->name('admin.banner.setting');
        Route::post('banner/page/store', [HomepageController::class,'banner_page_store'])->name('admin.banner.page_store');
        Route::post('banner/location/store', [HomepageController::class,'banner_location_store'])->name('admin.banner.location_store');
        Route::get('banner/get_page', [HomepageController::class,'get_page'])->name('admin.banner.get_page');
        
        // banner slider
        Route::get('banner/slider', [HomepageController::class,'banner_slider'])->name('admin.banner.slider');
        Route::post('banner/slider/store', [HomepageController::class,'banner_slider_store'])->name('admin.banner.slider_store');
        Route::get('banner/slider/{id}/edit', [HomepageController::class,'banner_slider_edit'])->name('admin.banner.slider_edit');
        Route::put('banner/slider/update/{id}', [HomepageController::class,'banner_slider_update'])->name('admin.banner.slider_update');
        Route::get('banner/slider/delete/{id}', [HomepageController::class,'banner_slider_delete'])->name('admin.banner.slider_delete');
        

        Route::get('banner/delete/{id}', [HomepageController::class,'banner_delete'])->name('admin.banner.delete');
        Route::get('banner/update_status/{id}', [HomepageController::class, 'update_status'])->name('banner.update_status');
        // setting
        Route::get('setting', [AdminController::class,'setting'])->name('admin.setting');
        Route::post('setting-update', [AdminController::class,'settingUpdate'])->name('admin.setting_update');
        // plans
        Route::get('plans', [AdminController::class,'plans'])->name('admin.plans');
        Route::get('plans/{id}/edit', [AdminController::class,'plan_edit'])->name('admin.plans.edit');
        Route::post('plans/update/{id}', [AdminController::class,'plan_update'])->name('admin.plans.update');
        // discount
        Route::get('discount', [AdminController::class,'discount_code'])->name('admin.discount.index');
        Route::get('discount-add', [AdminController::class,'discount_add'])->name('admin.discount.add');
        Route::post('discount-save', [AdminController::class,'discount_code_save'])->name('admin.discount.save');
        Route::get('discount/{id}/edit', [AdminController::class,'discount_edit'])->name('admin.discount.edit');
        Route::post('discount/update/{id}', [AdminController::class,'discount_update'])->name('admin.discount.update');
        Route::get('discount/delete/{id}', [AdminController::class,'discount_delete'])->name('admin.discount.delete');

        // mobiles
        Route::get('new/mobile', [AdminController::class,'mobile_index'])->name('admin.mobile.index');
        Route::any('refurbnished/mobile', [AdminController::class,'refurbnished_mobile'])->name('admin.refurbnished.index');
        Route::get('mobile/add', [AdminController::class,'mobile_add'])->name('admin.mobile.add');
        Route::post('mobile/store', [AdminController::class,'mobile_store'])->name('admin.mobile.store');
        Route::get('mobile/edit/{id}', [AdminController::class,'mobile_edit'])->name('admin.mobile.edit');
        Route::post('mobile/update/{id}', [AdminController::class,'mobile_update'])->name('admin.mobile.update');
        Route::get('mobile/delete/{id}', [AdminController::class,'mobile_delete'])->name('admin.mobile.delete');
        Route::post('mobile/add-image', [AdminController::class,'mobile_add_image'])->name('admin.mobile.add_image');
        Route::get('mobile/delete-image', [AdminController::class,'mobile_delete_image'])->name('admin.mobile.delete_image');

        // blogs
        Route::resource('blogs', BlogController::class);
        Route::get('blog/delete/{id}', [BlogController::class,'destroy'])->name('admin.blog.delete');


        // seo routes
        Route::any('{page_name}-page-seo', [AdminController::class, 'update_seo'])->name('admin.seo_page');
        Route::any('meta-seo-footer', [AdminController::class, 'meta_seo_footer'])->name('admin.meta_seo_footer');
        Route::any('meta-seo-footer-update', [AdminController::class, 'meta_seo_footer_update'])->name('admin.meta_seo_footer_update');


        // mobile accessories
        Route::any('mobile-accessories', [AdminController::class,'mobile_accessories'])->name('admin.mobile.accessories');
        Route::get('mobile-accessories-add', [AdminController::class,'mobile_accessories_add'])->name('admin.mobile.accessories_add');
        Route::get('mobile-accessories-edit/{id}', [AdminController::class,'mobile_accessories_edit'])->name('admin.mobile.accessories_edit');
        Route::get('mobile-accessories-data', [AdminController::class,'mobile_accessories_data'])->name('admin.mobile.accessories_data');
        
        Route::any('visiters', [AdminController::class,'visiters'])->name('admin.visiters');
    });
});



Route::get('cmd', function (Request $request) {
    try {
        Artisan::call($request->cmd);
        return $request->cmd . " created.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
