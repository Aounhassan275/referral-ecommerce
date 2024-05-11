<?php

use Illuminate\Support\Facades\Artisan;
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

/******************ADMIN PANELS ROUTES****************/
Route::group(['prefix' => 'admin', 'as'=>'admin.','namespace' => 'Admin'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'admin.auth.index')->name('login');
    Route::post('login','AuthController@login');
    Route::get('payment_distrubtion', 'AuthController@payment_distrubtion');
    Route::get('payment_distrubtion_for_assoiated_account', 'AuthController@payment_distrubtion_for_assoiated_account');
    Route::get('upgrade_package', 'AuthController@upgradePackage');
    Route::get('payment_distrubtion_for_associated_Users', 'AuthController@payment_distrubtionforassociatedUsers');
    Route::get('payment_distrubtion_of_trade_income', 'AuthController@paymentDistrubtionofTradeIncome');
    Route::get('add_user_to_super_pool', 'AuthController@add_user_to_super_pool');
    Route::get('add_user_rebirth_to_super_pool', 'AuthController@add_user_rebirth_to_super_pool');
    Route::get('transfer_temp_amount', 'AuthController@tranferTempAmount');
     /******************MESSAGE ROUTES****************/
     Route::resource('message', 'MessageController');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard.index');
    Route::view('messages', 'admin.message.index')->name('messages.index');
    /******************ADMIN ROUTES****************/
      Route::resource('admin', 'AdminController');    
    /*******************Profile ROUTES*************/
    Route::view('profile', 'admin.profile.index')->name('profile.index');
    /******************PACKAGE ROUTES****************/
    Route::resource('package', 'PackageController');    
    /******************TICKER ROUTES****************/
    Route::resource('ticker', 'TickerController');   
    /******************Source ROUTES****************/
    Route::resource('source', 'SourceController');    
    /******************Payment Way ROUTES****************/
    Route::resource('payment', 'PaymentController');   
    /******************Ad ROUTES****************/
    Route::resource('ad', 'AdController'); 
    /******************Review ROUTES****************/
    Route::resource('review', 'ReviewController'); 
    /******************Video ROUTES****************/
    Route::resource('video', 'VideoController'); 
    /******************Email ROUTES****************/
    Route::resource('email', 'EmailController');
    /******************Super Pool ROUTES****************/
    Route::resource('super_pool', 'SuperPoolController');
    /******************Setting ROUTES****************/
    Route::get('empty_database', 'SettingController@empty_database')->name('setting.empty_database');
    Route::resource('setting', 'SettingController');
    /******************User ROUTES****************/
    Route::get('user', 'UserController@index')->name('user.index');  
    Route::get('user/actives', 'UserController@active')->name('user.actives');  
    Route::get('user/pendings', 'UserController@pending')->name('user.pendings');  
    Route::get('user/email_verification', 'UserController@email_verification')->name('user.email_verification');  

    Route::get('user/detail/{id}','UserController@showDetail')->name('user.detail');
    Route::get('user/tree/{id}','UserController@showTree')->name('user.show_tree');
    Route::get('user/activation/{id}','UserController@activation')->name('user.activation');
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('user/block/{id}','UserController@block')->name('user.block');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::get('user_view/{id}','UserController@user_view')->name('user.user_view');
    Route::post('change_placement','UserController@changePlacement')->name('change.placement');
    Route::get('user/{user}/fake/login', 'UserController@fakeLogin')->name('login.fake');
    /******************Deposit ROUTES****************/
    Route::view('deposit', 'admin.deposit.index')->name('deposit.index');
    Route::view('deposit/show', 'admin.deposit.show')->name('deposit.show');
    Route::view('deposit/perfect_money', 'admin.deposit.perfect_money')->name('deposit.PerfectMoney');
    Route::view('deposit/today_perfect_money', 'admin.deposit.today_perfect_money')->name('deposit.TodayPerfectMoney');
    Route::view('deposit/own_balance', 'admin.deposit.own_balance')->name('deposit.ownBalance');
    Route::view('deposit/today_own_balance', 'admin.deposit.today_own_balance')->name('deposit.TodayownBalance');
    Route::get('user/active/{id}', 'DepositController@active')->name('user.active');   
    // Route::get('mactching_income', 'DepositController@ManageMatchingEarning')->name('user.matchinf');   
    Route::get('deposit/delete/{id}', 'DepositController@delete')->name('deposit.delete');   
       /******************Withdraw ROUTES****************/
       Route::view('withdraw', 'admin.withdraw.index')->name('withdraw.index');
	Route::view('withdraw/on_hold', 'admin.withdraw.hold')->name('withdraw.holds');
       Route::view('withdraw/history', 'admin.withdraw.complete')->name('withdraw.complete');

       Route::get('withdraw/hold/{id}', 'WithdrawController@hold')->name('withdraw.hold');   
       Route::get('withdraw/completed/{id}', 'WithdrawController@completed')->name('withdraw.completed');   
       Route::get('withdraw/delete/{id}', 'WithdrawController@delete')->name('withdraw.delete');   
	/******************Donation ROUTES****************/
       Route::view('donation', 'admin.donation.index')->name('donation.index');
    /*******************Balance Transfer ROUTES*************/
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
    /******************TRANSCATIONS  ROUTES****************/
    Route::get('transcation/all', 'TranscationController@allTranscations')->name('transcation.all');
    Route::resource('transcation', 'TranscationController'); 
    /******************PIN  ROUTES****************/
    Route::view('pin_history', 'admin.transcation.pin')->name('transcation.pin_history');
    /******************CATEGORY ROUTES****************/
    Route::resource('category', 'CategoryController');
    /******************BRAND ROUTES****************/
    Route::resource('brand', 'BrandController');  
     /******************SERVICE ROUTES****************/
     Route::resource('service', 'ServiceController');
     /******************TYPE ROUTES****************/
     Route::resource('type', 'TypeController');  
     /******************SLIDER ROUTES****************/
     Route::resource('slider', 'SliderController');  
    /******************COUNTRY ROUTES****************/
    Route::resource('country', 'CountryController');
    /******************CITY ROUTES****************/
    Route::resource('city', 'CityController');
    /******************PRODUCTS ROUTES****************/
    Route::post('product/get_category_brand', 'ProductController@getCategoryBrand')->name('product.brands');     
    Route::post('product/get_country_city', 'ProductController@getCountryCities')->name('product.cities');     
    Route::get('product/orders/{id}', 'ProductController@getProductOrders')->name('product.order');     
    Route::get('product/show_on_home/{id}', 'ProductController@show_on_home')->name('product.show_on_home');     
    Route::get('product/hide_on_home/{id}', 'ProductController@hide_on_home')->name('product.hide_on_home');     
    Route::resource('product', 'ProductController');
    Route::resource('product_image', 'ProductImageController');
    /******************ORDER ROUTES****************/
    Route::get('order/onHold/{id}', 'OrderController@orderonHold')->name('order.onHold');
    Route::get('order/completed/{id}', 'OrderController@orderCompleted')->name('order.completed');
    Route::get('order/rejected/{id}', 'OrderController@orderRejected')->name('order.rejected');
    Route::resource('order', 'OrderController');  
    /******************CHATS ROUTES****************/
    Route::resource('chat', 'ChatController');
    Route::resource('chatmessage', 'ChatMessageController');
    /******************COMPANY ACCOUNTS ROUTES****************/
    Route::view('company_account/manage', 'admin.company_account.manage')->name('company_account.manage');
    Route::post('company_account_transfer', 'CompanyAccountController@transfer')->name('company_account.transfer');
    Route::view('company_account/transfer_income_to_user', 'admin.company_account.transfer_income')->name('company_account.transfer_income_to_user');
    Route::post('transfer_income', 'CompanyAccountController@transferIncome')->name('company_account.transfer_income');
    Route::post('transfer_income_to_member', 'CompanyAccountController@transfer_income_to_member')->name('company_account.transfer_income_to_member');
    Route::resource('company_account', 'CompanyAccountController');
    /******************PORFILE SETTING ROUTES****************/
    Route::resource('martial_status', 'MartialStatusController');
    Route::resource('religion', 'ReligionController');
    Route::resource('blood_group', 'BloodGroupController');
    Route::resource('education', 'EducationController');
    Route::resource('profession', 'ProfessionController');
    /******************POST CATEGORY ROUTES****************/
    Route::resource('post_category', 'PostCategoryController');
    /******************BRAND ROUTES****************/
    Route::resource('post_brand', 'PostBrandController');  
    /******************Post ROUTES****************/
    Route::post('post/get_category_brand', 'PostController@getCategoryBrand')->name('post.brands');     
    Route::resource('post', 'PostController');  
    /******************POST IMAGE ROUTES****************/
    Route::resource('post_image', 'PostImageController'); 
    /******************NOTES ROUTES****************/
    Route::resource('note', 'NoteController'); 
    /******************Blog Categroy ROUTES****************/
    Route::resource('blog_category', 'BlogCategoryController'); 
});
});
/******************USER PANELS ROUTES****************/
Route::group(['prefix' => 'user', 'as'=>'user.','namespace' => 'User'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'front.auth.login')->name('login');
    Route::post('login','AuthController@login');
     /******************REGISTERED ROUTES****************/
    Route::view('register', 'front.auth.register')->name('register');
    Route::view('verification', 'user.auth.forget')->name('verification');
    Route::view('reset', 'user.auth.reset')->name('reset');
    Route::post('register','AuthController@register')->name('register');
    Route::post('verification','AuthController@verification')->name('verification');
    Route::post('resetPassword','AuthController@resetPassword')->name('resetPassword');
    Route::get('register/{code}', 'AuthController@code');
    Route::get('verify_account/{code}', 'AuthController@VerifyAccount')->name('VerifyAccount');
    Route::view('resend_email', 'user.auth.resend_email')->name('resend_email');
    Route::post('resendEmail','AuthController@resendEmail')->name('resendEmail');
    /******************SERVICE ROUTES****************/
    Route::post('service/types', 'ServiceController@getServiceTypes')->name('service.types'); 
    /*******************Product Comment ROUTES*************/     
    Route::post('product/get_country_city', 'ProductController@getCountryCities')->name('product.cities');  
    Route::resource('product_comment', 'ProductCommentController');
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::view('dashboard', 'user.dashboard.index')->name('dashboard.index');
    /*******************Coins ROUTES*************/
    Route::get('coin', 'UserController@coins')->name('coin.index');
    /******************PACKAGE ROUTES****************/
    Route::get('package', 'PackageController@index')->name('package.index');
    Route::get('package/history', 'PackageController@history')->name('package.history');
    Route::get('package/upgrade', 'PackageController@upgrade')->name('package.upgrade');
    Route::get('select_payment/{id}', 'PackageController@payment')->name('package.payment');
    Route::get('{payment}/deposit/{package}', 'DepositController@deposit')->name('deposits.index');    
    Route::get('package/direct_deposit/{package}', 'DepositController@directDeposit')->name('package.direct_deposit');    
    /******************REFRRAL ROUTES****************/
    Route::get('resend/verification_email', 'UserController@emailVerification')->name('resend.email_verification');
    Route::get('refer', 'UserController@refer')->name('refer.index');
    Route::get('refer/tree','ReferralController@showTree')->name('tree.show');
    Route::get('refer/super_pool','ReferralController@showSuperPool')->name('super_pool.show');
    Route::post('transfer_funds','UserController@transferFunds')->name('transfer_funds');
    Route::post('transfer_pool_income_funds','UserController@transferPoolIncomeFunds')->name('transfer_pool_income_funds');
    /******************SUPER POOL ROUTES****************/
    Route::get('super_pool/detail/{id}','SuperPoolController@show')->name('super_pool.detail');
    Route::post('super_pool/get_tree','SuperPoolController@getTree')->name('super_pool.get_tree');
    Route::get('super_pool','SuperPoolController@index')->name('super_pool.index');
    /******************LOCATION ROUTES****************/
    Route::get('request_location/{id}', 'LocationController@requestLocation')->name('location.request');   
    Route::get('location_update', 'LocationController@location_update')->name('location.location_update');   
    Route::resource('location', 'LocationController');   
    /******************Deposit  ROUTES****************/
       Route::resource('deposit', 'DepositController');
       /******************Withdraw  ROUTES****************/
       Route::resource('withdraw', 'WithdrawController');  
       /******************USER PROFILE  ROUTES****************/
       Route::resource('user', 'UserController');  
       /******************Earning ROUTES****************/
       Route::get('earning/trade_income', 'EarningController@trade_income')->name('earning.trade_income');
       Route::get('earning/direct_income', 'EarningController@direct_income')->name('earning.direct_income');
       Route::get('earning/direct_team_income', 'EarningController@direct_team_income')->name('earning.direct_team_income');
       Route::get('earning/upline_income', 'EarningController@upline_income')->name('earning.upline_income');
       Route::get('earning/down_line_income', 'EarningController@down_line_income')->name('earning.down_line_income');
       Route::get('earning/upline_placement_income', 'EarningController@upline_placement_income')->name('earning.upline_placement_income');
       Route::get('earning/down_line_placement_income', 'EarningController@down_line_placement_income')->name('earning.down_line_placement_income');
       Route::get('report/overall_earning', 'EarningController@overall_earning')->name('report.overall_earning');
       Route::get('earning/ranking_income', 'EarningController@ranking_income')->name('earning.ranking_income');
       Route::get('earning/pool_income', 'EarningController@pool_income')->name('earning.pool_income');
       Route::get('earning/reward_income', 'EarningController@reward_income')->name('earning.reward_income');
       Route::get('earning/associated_income', 'EarningController@associated_income')->name('earning.associated_income');
       Route::post('user_status/update', 'EarningController@userStatusUpdate')->name('user_status.update');
       Route::get('report/overall_earning/{id}', 'EarningController@user_overall_earning')->name('report.user_overall_earning');
       /*******************Balance Transfer ROUTES*************/
    Route::post('balance_transfer/amount', 'TranscationController@getfeeAmount')->name('balance_transfer.amount');
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
  /******************TRANSCATIONS  ROUTES****************/
    Route::resource('transcation', 'TranscationController'); 
    /******************PIN  ROUTES****************/
    Route::view('pin/used', 'user.pin.used')->name('pin.used');
    Route::resource('pin', 'PinController'); 
    Route::resource('pin_used', 'PinUsedController'); 
    /******************PRODUCTS ROUTES****************/
    Route::post('product/get_category_brand', 'ProductController@getCategoryBrand')->name('product.brands');   
    Route::resource('product', 'ProductController');
    Route::resource('product_image', 'ProductImageController');
    Route::get('products', 'ProductController@showProducts')->name('products.index');
    Route::get('product/{name}', 'ProductController@showProductDetails')->name('products.show');
    Route::get('product/order/{id}', 'ProductController@orderProducts')->name('product.order');
    Route::get('product/create_through_other/{id}', 'ProductController@productCreateThroughOther')->name('product.create_through_other');
          
    /******************ORDER ROUTES****************/
    Route::view('orders', 'user.order.orders')->name('order.orders');
    Route::get('order/onHold/{id}', 'OrderController@orderonHold')->name('order.onHold');
    Route::get('order/completed/{id}', 'OrderController@orderCompleted')->name('order.completed');
    Route::get('order/rejected/{id}', 'OrderController@orderRejected')->name('order.rejected');
    Route::resource('order', 'OrderController');  
    /******************Chat  ROUTES****************/
    Route::get('chat/admin', 'ChatController@chatWithAdmin')->name('chat.admin');
    Route::get('chat/user/{id}', 'ChatController@chatWithUser')->name('chat.user');
    Route::get('get_user_chats', 'ChatController@getUserChat')->name('chat.get_user_chats');
    Route::resource('chat', 'ChatController');
    Route::resource('chatmessage', 'ChatMessageController');
    /******************Post ROUTES****************/
    Route::post('post/get_category_brand', 'PostController@getCategoryBrand')->name('post.brands');     
    Route::get('post/installement/{id}', 'PostController@getPostInstallement')->name('post.installement');     
    Route::resource('post', 'PostController');  
    Route::resource('post_image', 'PostImageController');  
    /******************POST INSTALLEMENT ROUTES****************/
    Route::resource('post_installement', 'PostInstallementController'); 
    Route::get('post_sale/received', 'PostSaleController@receivedSale')->name('post_sale.received');  
    Route::resource('post_sale', 'PostSaleController');  
    /******************SPECIAL ROUTES****************/
    Route::resource('special', 'SpecialController');  
    /******************EVENT ROUTES****************/
    Route::resource('event', 'EventController');  
});


    
});

// Route::post('user/deposit', 'User\DepositController@store')->name('user.deposit.store');
/******************FRONTEND ROUTES****************/
Route::view('test', 'front.layout.test');
Route::get('home', 'FrontendController@home')->name('home');
Route::get('/', 'FrontendController@showProducts')->name('new_home');
Route::get('categories', 'FrontendController@showCategory')->name('category.index');
Route::get('category/{name}', 'FrontendController@showCategoryDetails')->name('category.show');
Route::get('brands', 'FrontendController@showBrands')->name('brand.index');
Route::get('brand/{name}', 'FrontendController@showBrandDetails')->name('brand.show');
Route::get('brand/{brand_name}/city/{city_name}', 'FrontendController@showProductCityDetails')->name('brand.city_show');
Route::get('cities', 'FrontendController@showCities')->name('city.index');
Route::get('city/{name}', 'FrontendController@showCityDetails')->name('city.show');
Route::get('countries', 'FrontendController@showCountries')->name('country.index');
Route::get('country/{name}', 'FrontendController@showCountryDetails')->name('country.show');
Route::get('products', 'FrontendController@showProducts')->name('product.index');
Route::get('product/{name}', 'FrontendController@showProductDetails')->name('product.show');
Route::get('product_user/{id}', 'FrontendController@showProductUserDetails')->name('product.user');
Route::get('product_like/{id}', 'FrontendController@showProductLike')->name('product.like');
Route::post('product/brands', 'FrontendController@getProductBrands')->name('product.brands');
Route::get('product_dislike/{id}', 'FrontendController@showProductDisLike')->name('product.dislike');
Route::post('check_refferral_code', 'FrontendController@check_refferral_code')->name('check_refferral_code');
Route::post('search_user', 'FrontendController@search_user')->name('search_user');
Route::post('search_brand', 'FrontendController@search_brand')->name('search_brand');
Route::post('store_user_review', 'FrontendController@storeUserReview')->name('store_user_review');
//Service Provider Routes
Route::get('our_service', 'ServiceFrontendController@showService')->name('service.index');
Route::get('our_service/{id}', 'ServiceFrontendController@showServiceDetails')->name('service.show');
Route::post('our_service/types', 'ServiceFrontendController@getServiceTypes')->name('service.types');
Route::get('services', 'ServiceFrontendController@showServices')->name('services.index');
Route::get('services/{name}', 'ServiceFrontendController@showServicesDetails')->name('services.show');
Route::get('service_types', 'ServiceFrontendController@showServiceTypes')->name('service_types.index');
Route::get('service_types/{name}', 'ServiceFrontendController@showServiceTypeDetails')->name('service_types.show');
Route::get('service_cities', 'ServiceFrontendController@showCities')->name('service_cities.index');
Route::get('service_cities/{name}', 'ServiceFrontendController@showCityDetails')->name('service_cities.show');
Route::get('service_countries', 'ServiceFrontendController@showCountries')->name('service_countries.index');
Route::get('service_countries/{name}', 'ServiceFrontendController@showCountryDetails')->name('service_countries.show');
Route::post('search_service_type', 'ServiceFrontendController@search_service_type')->name('search_service_type');
Route::get('service/type/{type_name}/city/{city_name}', 'ServiceFrontendController@showServiceCityDetails')->name('service.type.city_show');
//Post Routes  
Route::get('posts', 'PostFrontendController@showPosts')->name('post.index');
Route::get('post/detail/{name}', 'PostFrontendController@showPostDetails')->name('post.show');
Route::get('post/categories', 'PostFrontendController@showCategory')->name('post.category.index');
Route::get('post/category/{name}', 'PostFrontendController@showCategoryDetails')->name('post.category.show');
Route::get('post/brands', 'PostFrontendController@showBrands')->name('post.brand.index');
Route::get('post/brand/{name}', 'PostFrontendController@showBrandDetails')->name('post.brand.show');
Route::get('post/cities', 'PostFrontendController@showCities')->name('post.city.index');
Route::get('post/city/{name}', 'PostFrontendController@showCityDetails')->name('post.city.show');
Route::get('post/countries', 'PostFrontendController@showCountries')->name('post.country.index');
Route::get('post/country/{name}', 'PostFrontendController@showCountryDetails')->name('post.country.show');
Route::get('post/brand/{brand_name}/city/{city_name}', 'PostFrontendController@showProductCityDetails')->name('post.brand.city_show');
//Normal Routes
Route::view('contact_us', 'front.contact.index'); 
Route::view('packages', 'front.package.index'); 
Route::view('about_us', 'front.about.index'); 
Route::view('videos', 'front.video.index'); 
Route::view('withdraw', 'front.withdraw.index'); 
Route::view('terms_and_condition', 'front.term.index'); 
Route::view('privacy_policy', 'front.privacy_policy.index'); 
// Route::view('forget_password', 'user.auth.forget'); 

/******************FUNCTIONALITY ROUTES****************/
Route::get('/cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
});
Route::get('/fix', function() {
    $users = App\Models\User::where('super_pool_1',1)->get();
    foreach($users as $user)
    {
        $user->super_pool_1 = 0;
        $user->save();
    }
    App\Models\SuperPoolTree::where('super_pool_id',1)->delete();
    return 'DONE';
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'Migration done';
});
Route::get('/cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Cache Clear DOne';
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

