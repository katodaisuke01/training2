<?php

use Illuminate\Support\Facades\Route;

if (config('app.env') === 'production' or config('app.env') === 'staging') {
    // asset()やurl()がhttpsで生成される
    URL::forceScheme('https');
}

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

Route::view('/', 'auth/login')->name('login');
Route::view('/warehouse/login', 'warehouse/auth/login');

Route::group([
    'as' => 'industry.',
    'namespace' => 'Industry',
    'prefix' => 'industry'
], function () {
    // ログイン
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('login/{industry_group_id}', 'Auth\LoginController@showLoginForm2')->name('loginShortCut');
    Route::group(['middleware' => 'auth:industry'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/cultivation', 'HomeController@cultivation')->name('cultivation');
        Route::group([
            'as' => 'market.',
            'prefix' => 'market'
        ], function () {
            Route::get('/detail/{business_group}', 'HomeController@detail')->name('detail');
            Route::get('/detail/fish', 'HomeController@detailFish')->name('detailFish');
            Route::get('/taskCalender', 'HomeController@taskCalender')->name('taskCalender');
            Route::get('/reset', 'AssortmentController@reset')->name('reset');
            Route::get('/resetComplete', 'AssortmentController@resetComplete')->name('resetComplete');
            Route::get('/workflow', 'AssortmentController@workflow')->name('workflow');
            Route::post('/workflow/store', 'AssortmentController@workflowStore')->name('workflow_store');
            Route::post('/workflow/imageStore', 'AssortmentController@imageStore')->name('imageStore');
            Route::post('/workflow/weightStore', 'AssortmentController@weightStore')->name('weightStore');
            Route::post('/workflow/deleteProduct', 'AssortmentController@deleteProduct')->name('deleteProduct');
            Route::post('/workflow/addProduct', 'AssortmentController@addProduct')->name('addProduct');
            Route::post('/workflow/resetCount', 'AssortmentController@resetCount')->name('resetCount');
            Route::group([
                'as' => 'dacs.',
                'prefix' => 'dacs'
            ], function () {
                Route::get('/', 'DacsController@index')->name('index');
                Route::post('/start', 'DacsController@start')->name('start');
                Route::get('/newData', 'DacsController@newData')->name('newData');
                Route::post('/stop', 'DacsController@stop')->name('stop');
            });
            Route::group([
                //  計量撮影
            ], function () {
                Route::get('/register', 'ProductRegisterController@register')->name('register');
                Route::post('/workflow/imageRegister', 'ProductRegisterController@imageRegister')->name('imageRegister');
                Route::post('/workflow/weightRegister', 'ProductRegisterController@weightRegister')->name('weightRegister');
                Route::post('/workflow/getProductInfo', 'ProductRegisterController@getProductInfo')->name('getProductInfo');
            });
            Route::group([
                // 仕分梱包
            ], function () {
                Route::get('/packing', 'AssortmentController@packing')->name('packing');
                Route::get('/getPackagelabel', 'AssortmentController@getPackagelabel')->name('getPackagelabel');
                Route::post('/packing/store/{package}', 'AssortmentController@store')->name('store');
                Route::post('/packing/packageImageStore', 'AssortmentController@packageImageStore')->name('packageImageStore');
                Route::get('/box', 'AssortmentController@Box')->name('box');
                Route::post('/packing/temporaryWeightStore', 'AssortmentController@temporaryWeightStore')->name('temporaryWeightStore');
            });
        });
    });
});
Route::group([
    'as' => 'admin.',
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    // QR読み込み詳細ページ
    Route::get('/order/itemList/{package}', 'OrderController@itemList')->name('order.itemList');
    Route::get('/order/itemDetail/{detail}', 'OrderController@itemDetail')->name('order.itemDetail');
    // ログイン
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('login/{industry_group_id}', 'Auth\LoginController@showLoginForm2')->name('loginShortCut');
    Route::middleware(['auth:admin', 'can:isAdmin'])->group(function () {
        Route::get('/home', 'WarehouseController@management')->name('home');
        Route::post('/print', 'WarehouseController@printCode')->name('printCode');
        Route::get('/pdf', 'WarehouseController@pdf')->name('pdf');
        Route::get('/download', 'WarehouseController@download')->name('download');
        Route::group([
            'as' => 'landing.',
        ], function () {
            Route::get('/landing', 'LandingController@landing')->name('index');
            Route::post('/landing/update', 'LandingController@update')->name('update');
            Route::get('/landing/history', 'LandingController@landingHistory')->name('history');
        });
        Route::group([
            'as' => 'order.',
        ], function () {
            Route::get('/order', 'OrderController@index')->name('index');
            Route::get('/order/detail/{business_group}', 'OrderController@detail')->name('detail');
            Route::get('/order/workList', 'OrderController@workList')->name('workList');
            Route::get('/order/document', 'OrderController@document')->name('document');
            Route::post('/order/update', 'OrderController@update')->name('update');
            Route::post('/order/deleteProduct', 'OrderController@deleteProduct')->name('deleteProduct');
            Route::post('/scheduleTime/update', 'OrderController@scheduleTimeUpdate')->name('scheduleTimeUpdate');
            Route::post('/scheduleTime/allUpdate', 'OrderController@scheduleTimeAllUpdate')->name('scheduleTimeAllUpdate');
            Route::post('/order/approval/update', 'OrderController@approvalLimitPrice')->name('approvalLimitPrice');
        });
        Route::group([
            'as' => 'document.',
        ], function () {
            Route::get('/document', 'DocumentController@index')->name('index');
            Route::get('/document/invoice', 'DocumentController@invoice')->name('invoice');
            Route::get('/document/show', 'DocumentController@document')->name('document');
            Route::post('/document/sendMail', 'DocumentController@sendMail')->name('sendMail');
            Route::post('/document/sendSupplyMail', 'DocumentController@sendSupplyMail')->name('sendSupplyMail');
            Route::get('/download/{business}', 'DocumentController@download')->name('download');
        });

        Route::group([
            'as' => 'item.',
        ], function () {
            Route::get('/item', 'ItemController@index')->name('index');
            Route::get('/item/create', 'ItemController@create')->name('create');
            Route::post('/item/store', 'ItemController@store')->name('store');
            Route::get('/item/edit/{product}', 'ItemController@edit')->name('edit');
            Route::post('/item/update/{product}', 'ItemController@update')->name('update');
            Route::post('/item/destroy/{product}', 'ItemController@destroy')->name('destroy');
        });
        Route::group([
            'as' => 'staff.',
        ], function () {
            Route::get('/staff', 'StaffController@index')->name('index');
            Route::get('/staff/create', 'StaffController@create')->name('create');
            Route::post('/staff/store', 'StaffController@store')->name('store');
            Route::get('/staff/edit/{staff}', 'StaffController@edit')->name('edit');
            Route::post('/staff/update/{staff}', 'StaffController@update')->name('update');
            Route::get('/staff/edit-password/{staff}', 'StaffController@pwEdit')->name('pwEdit');
            Route::post('/staff/edit-password/store/{staff}', 'StaffController@pwEditStore')->name('pwEdit.store');
            Route::post('/staff/destroy/{staff}', 'StaffController@destroy')->name('destroy');
        });
        Route::group([
            'as' => 'company.',
        ], function () {
            Route::get('/company', 'CompanyController@index')->name('index');
            Route::get('/company/edit', 'CompanyController@edit')->name('edit');
            Route::post('/company/update', 'CompanyController@update')->name('update');
        });
        Route::group([
            'as' => 'master.',
        ], function () {
            Route::get('/master', 'MasterController@index')->name('index');
            Route::get('/master/getMCategories', 'MasterController@getMCategories')->name('getMCategories');
            Route::get('/master/getMFishCategories', 'MasterController@getMFishCategories')->name('getMFishCategories');
            Route::get('/master/getMProcesses', 'MasterController@getMProcesses')->name('getMProcesses');
            Route::post('/master/addMCategory', 'MasterController@addMCategory')->name('addMCategory');
            Route::post('/master/addMFishCategory', 'MasterController@addMFishCategory')->name('addMFishCategory');
            Route::post('/master/addMProcess', 'MasterController@addMProcess')->name('addMProcess');
            Route::post('/master/editMCategory', 'MasterController@editMCategory')->name('editMCategory');
            Route::post('/master/editMFishCategory', 'MasterController@editMFishCategory')->name('editMFishCategory');
            Route::post('/master/editMProcess', 'MasterController@editMProcess')->name('editMProcess');
            Route::post('/master/deleteMCategory', 'MasterController@deleteMCategory')->name('deleteMCategory');
            Route::post('/master/deleteMFishCategory', 'MasterController@deleteMFishCategory')->name('deleteMFishCategory');
            Route::post('/master/deleteMProcess', 'MasterController@deleteMProcess')->name('deleteMProcess');
            Route::post('/master/store', 'MasterController@store')->name('store');
            Route::post('/master/destroy', 'MasterController@destroy')->name('destroy');
        });
    });
});

Route::group([
    'as' => 'warehouse.',
    'namespace' => 'Warehouse',
    'prefix' => 'warehouse'
], function () {
    // ログイン
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('login/{m_business_id}', 'Auth\LoginController@showLoginForm2')->name('login2');
    Route::middleware(['auth:warehouse'])->group(function () {
        Route::get('/home', 'WarehouseController@admin')->name('home');
        Route::get('/login/forget', 'WarehouseController@forget')->name('forget');
        Route::get('/login/complete', 'WarehouseController@complete')->name('complete');
        Route::post('/home/getChart', 'WarehouseController@getChart')->name('chart');

        Route::group([
            'as' => 'order.',
        ], function () {
            Route::get('/order', 'OrderController@index')->name('index');
            Route::get('/order/detail', 'OrderController@show')->name('detail');
            Route::get('/order/create', 'OrderController@create')->name('create');
            Route::post('/order/store', 'OrderController@store')->name('store');
            Route::post('/order/catalogStore', 'OrderController@catalogStore')->name('catalogStore');
            Route::get('/order/confirm', 'OrderController@confirm')->name('confirm');
            Route::get('/order/complete', 'OrderController@complete')->name('complete');
            Route::get('/order/edit', 'OrderController@edit')->name('edit');
            Route::post('/order/update', 'OrderController@update')->name('update');
            Route::post('/order/clientSelect', 'OrderController@clientSelect')->name('clientSelect');
            Route::post('/order/destroy', 'OrderController@destroy')->name('destroy');
            Route::post('/order/fix', 'OrderController@fix')->name('fix');
            Route::get('/order/getPrice', 'OrderController@getPrice')->name('getPrice');
            Route::post('/order/give_or_cancel', 'OrderController@giveOrCancel')->name('giveOrCancel');
        });

        Route::get('/result', 'WarehouseController@adminResult')->name('adminResult');
        Route::get('/staff', 'WarehouseController@adminStaff')->name('adminStaff');
        Route::get('/import', 'WarehouseController@adminImport')->name('adminImport');
        Route::get('/function', 'WarehouseController@adminFunction')->name('adminFunction');

        Route::group([
            'as' => 'labor.',
        ], function () {
            Route::get('/labor', 'LaborController@index')->name('index');
            Route::get('/labor/detail', 'LaborController@detail')->name('detail');
            Route::get('/labor/create', 'LaborController@create')->name('create');
            Route::post('/labor/store', 'LaborController@store')->name('store');
            Route::get('/labor/edit', 'LaborController@edit')->name('edit');
            Route::post('/labor/update', 'LaborController@update')->name('update');
            Route::get('/labor/edit-password', 'LaborController@pwEdit')->name('pwEdit');
            Route::post('/labor/edit-password/store', 'LaborController@pwEditStore')->name('pwEdit.store');
            Route::post('/labor/destroy', 'LaborController@destroy')->name('destroy');
        });

        Route::group([
            'as' => 'master.',
        ], function () {
            Route::get('/master', 'MasterController@index')->name('index');
            Route::get('/master/getClients', 'MasterController@getClients')->name('getClients');
            Route::get('/master/getDeliveries', 'MasterController@getDeliveries')->name('getDeliveries');
            Route::post('/master/editClient', 'MasterController@editClient')->name('editClient');
            Route::post('/master/addClient', 'MasterController@addClient')->name('addClient');
            Route::post('/master/deleteClient', 'MasterController@deleteClient')->name('deleteClient');
            Route::post('/master/editDelivery', 'MasterController@editDelivery')->name('editDelivery');
            Route::post('/master/addDelivery', 'MasterController@addDelivery')->name('addDelivery');
            Route::post('/master/deleteDelivery', 'MasterController@deleteDelivery')->name('deleteDelivery');
            Route::post('/master/store', 'MasterController@store')->name('store');
            Route::post('/master/destroy', 'MasterController@destroy')->name('destroy');
        });
        Route::group([
            'as' => 'company.',
        ], function () {
            Route::get('/company', 'CompanyController@index')->name('index');
            Route::get('/company/edit', 'CompanyController@edit')->name('edit');
            Route::post('/company/update', 'CompanyController@update')->name('update');
        });

    });
});
Route::group([
    'as' => 'worker.',
    'namespace' => 'Worker',
    'prefix' => 'worker'
], function () {
    // ログイン
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('login/{m_business_id}', 'Auth\LoginController@showLoginForm2')->name('login2');
    Route::middleware(['auth:worker'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/login/forget', 'HomeController@loginForget')->name('forget');
        Route::get('/login/complete', 'HomeController@loginComplete')->name('complete');

        Route::group([
            'as' => 'account.',
        ], function () {
            Route::get('/account/mypage', 'AccountController@mypage')->name('mypage');
            Route::get('/account/edit', 'AccountController@edit')->name('edit');
            Route::get('/account/password', 'AccountController@editPassword')->name('editPassword');
        });

        Route::group([
            'as' => 'accept.',
            'prefix' => 'accept',
            'namespace' => 'Accept'
        ], function () {
            Route::group([
                'as' => 'handle.',
                'prefix' => 'handle',
            ], function () {
                Route::get('/', 'HandleController@index')->name('index');
                Route::get('getPackage', 'HandleController@getPackage')->name('getPackage');
                Route::post('order/check', 'HandleController@checkOrder')->name('order.check');
                Route::post('order/alert', 'HandleController@alertOrder')->name('order.alert');
            });
            Route::group([
                'as' => 'sort.',
                'prefix' => 'sort',
            ], function () {
                Route::get('/', 'SortController@index')->name('index');
                Route::post('/sortDataByUrl', 'SortController@sortDataByUrl')->name('sortDataByUrl');
                Route::post('/associateWithTray', 'SortController@associateWithTray')->name('associateWithTray');
            });
        });

        Route::group([
            'as' => 'picking.'
        ], function () {
            Route::get('/picking', 'PickingController@index')->name('index');
            Route::post('/picking/store', 'PickingController@store')->name('store');
        });

        Route::group([
            'as' => 'shipping.'
        ], function () {
            Route::get('/shipping', 'ShippingController@index')->name('index');
            Route::post('/shipping/update', 'ShippingController@update')->name('update');
            Route::post('/shipping/update/getClientPackage', 'ShippingController@getClientPackage')->name('getClientPackage');
        });

        Route::group([
            'as' => 'account.'
        ], function () {
            Route::get('/account', 'AccountController@index')->name('index');
        });
    });
});

Route::get('/invoice/output/{business}/{industryGroupId}', 'OutputController@invoice')->name('output.invoice.index');
Route::get('/supply/output/{business}/{industryGroupId}', 'OutputController@supply')->name('output.supply.index');
Route::get('/output/download/{business}/{industryGroupId}', 'OutputController@download')->name('output.download');


// ============================================================================
// ソラシドエア
// ============================================================================
Route::group([
    'as' => 'solaseed.',
    'namespace' => 'Solaseed',
    'prefix' => 'solaseed'
], function () {
    // ログイン
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('login/{delivery_partner_id?}', 'Auth\LoginController@showLoginForm')->name('login');
    Route::middleware(['auth:solaseed'])->group(function () {
        Route::get('/home', 'SolaseedController@index')->name('home');
        Route::get('/login/forget', 'SolaseedController@loginForget')->name('forget');
        Route::get('/login/complete', 'SolaseedController@loginComplete')->name('complete');

        Route::group([
            'as' => 'pickup.',
            'prefix' => 'pickup'
        ], function () {
            Route::get('/', 'PickupController@index')->name('index');
            Route::get('/list/{industry}', 'PickupController@pickupList')->name('list');
            Route::get('/getBoxData', 'PickupController@getBoxData')->name('getBoxData');
            Route::post('/packageUpdate', 'PickupController@update')->name('packageUpdate');
        });
        Route::group([
            'as' => 'order.',
            'prefix' => 'order'
        ], function () {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/list/{industry}', 'OrderController@orderList')->name('list');
        });
        Route::group([
            'as' => 'transport.',
            'prefix' => 'transport'
        ], function () {
            Route::get('/', 'TransportController@index')->name('index');
            Route::get('/detail/{package}', 'TransportController@show')->name('detail');
            Route::get('/confirm/{package}', 'TransportController@confirm')->name('confirm');
            Route::post('/store', 'TransportController@store')->name('store');
            Route::post('/entry/{package}', 'TransportController@entry')->name('entry');
        });
        Route::group([
            'as' => 'checkin.',
            'prefix' => 'checkin'
        ], function () {
            Route::get('/', 'CheckinController@checkin')->name('index');
            Route::get('/list/{business}', 'CheckinController@checkinList')->name('list');
            Route::get('/checked_in/{package}', 'CheckinController@checkedIn')->name('checked_in');
            Route::post('/checked_in/create_history', 'CheckinController@createHistory')->name('create_history');
        });
        Route::group([
            'as' => 'partner.',
            'prefix' => 'partner'
        ], function () {
            Route::get('/', 'PartnerController@index')->name('index');
            Route::get('/detail/{type}/{partner}', 'PartnerController@show')->name('detail')->where('type', '[0-9]+');
            Route::get('/create', 'PartnerController@create')->name('create');
            Route::post('/store', 'PartnerController@store')->name('store');
            Route::get('/edit/{type}/{partner}', 'PartnerController@edit')->name('edit')->where('type', '[0-9]+');
            Route::post('/update', 'PartnerController@update')->name('update');
        });
        Route::group([
            'as' => 'account.',
            'prefix' => 'account',
            'middleware' => 'can:isAdmin'
        ], function () {
            Route::get('/', 'AccountController@index')->name('index');
            Route::get('/pw/{delivery_user}', 'AccountController@pw')->name('pw');
            Route::post('/pw/update', 'AccountController@updatePw')->name('pw.update');
            Route::get('/edit/{delivery_user}', 'AccountController@edit')->name('edit');
            Route::post('/update', 'AccountController@update')->name('update');
            Route::get('/create', 'AccountController@create')->name('create');
            Route::post('/store', 'AccountController@store')->name('store');
            Route::post('/destroy/{delivery_user}', 'AccountController@destroy')->name('destroy');
        });
        Route::group([
            'as' => 'document.',
            'prefix' => 'document',
            'middleware' => 'can:isAdmin'
        ], function () {
            Route::get('/', 'DocumentController@index')->name('index');
            Route::get('/invoice', 'DocumentController@invoice')->name('invoice');
        });
    });
});


// QR読み込み詳細ページ
Route::get('/itemList/{package}', 'QrController@itemList')->name('itemList');
Route::get('/itemDetail/{order}', 'QrController@itemDetail')->name('itemDetail');
Route::get('/stockDetail/{order}', 'QrController@stockDetail')->name('stockDetail');
Route::get('/pickList/{client_package}', 'QrController@pickList')->name('pickList');
