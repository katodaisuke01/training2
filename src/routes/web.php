<?php

use Illuminate\Support\Facades\Route;

if (config('app.env') == 'production') {
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
Route::get('/testmail', function(){
    // routeから作成したメールクラスを呼び出し
    return new App\Mail\professional\ConsultationDateFixed;
  });
Route::group([
  'as' => 'project.',
  'prefix' => 'project'
], function () {
    Route::get('/', 'ProjectController@index')->name('index');
    Route::get('/single', 'ProjectController@single')->name('single');
});
/* --------------------------------------------------------------------------
ユーザー
--------------------------------------------------------------------------*/
Route::group([
  'as' => '',
  'prefix' => ''
], 
  function () {
    Route::get('/home', 'CommonController@index')->name('index');
    Route::get('/searchResult', 'CommonController@searchResult')->name('searchResult');
    // フッターからのページ
    Route::get('/about', 'CommonController@about')->name('about');
    Route::get('/privacy', 'CommonController@privacy')->name('privacy');
    Route::get('/security', 'CommonController@security')->name('security');
    Route::get('/terms', 'CommonController@terms')->name('terms');
    Route::get('/faq', 'CommonController@faq')->name('faq');
    Route::get('/sitemap', 'CommonController@sitemap')->name('sitemap');
    /* --------------------------------------------------------------------------
    ユーザー
    --------------------------------------------------------------------------*/
    // 公式からのコンテンツ
    Route::get('/content', 'CommonController@content')->name('content');
    Route::get('/content/detail', 'CommonController@contentDetail')->name('contentDetail');
    // 企業ページ
    Route::get('/corporate', 'CorporateController@corporate')->name('corporate');
    Route::get('/corporate/job', 'CorporateController@job')->name('job');
    Route::get('/corporate/job/apply', 'CorporateController@apply')->name('apply');
    Route::get('/corporate/job/applied', 'CorporateController@applied')->name('applied');
    Route::get('/corporate/post', 'CorporateController@post')->name('post');
    Route::get('/corporate/post/detail', 'CorporateController@postDetail')->name('postDetail');
    // 診断ページ
    Route::get('/diagnose', 'CommonController@diagnose')->name('diagnose');
    Route::get('/diagnose/question', 'CommonController@question')->name('question');
    Route::get('/diagnose/result', 'CommonController@result')->name('result');
    // ユーザーログイン関連
    Route::get('/login', 'UserController@login')->name('login');
    Route::get('/reset', 'UserController@reset')->name('reset');
    Route::get('/sent', 'UserController@sent')->name('sent');
    Route::get('/withdrawal', 'UserController@withdrawal')->name('withdrawal');
    // ユーザー新規登録関連
    Route::get('/register', 'UserController@register')->name('register');
    Route::get('/confirm', 'UserController@confirm')->name('confirm');
    Route::get('/complete', 'UserController@complete')->name('complete');
    // ユーザーページ
    Route::get('/mypage', 'UserController@mypage')->name('mypage');
    Route::get('/mypage/edit1', 'UserController@edit1')->name('edit1');
    Route::get('/mypage/edit2', 'UserController@edit2')->name('edit2');
    Route::get('/mypage/edit3', 'UserController@edit3')->name('edit3');
    Route::get('/mypage/ban', 'UserController@ban')->name('ban');
    Route::get('/mypage/pw', 'UserController@pw')->name('pw');
    Route::get('/mypage/message', 'UserController@message')->name('message');
    Route::get('/mypage/message/detail', 'UserController@messageDetail')->name('messageDetail');
    Route::get('/mypage/information', 'UserController@information')->name('information');
    Route::get('/mypage/information/detail', 'UserController@informationDetail')->name('informationDetail');
    Route::get('/mypage/curiosity', 'UserController@curiosity')->name('curiosity');
    Route::get('/mypage/scout', 'UserController@scout')->name('scout');
    Route::get('/mypage/favorite', 'UserController@favorite')->name('favorite');
    Route::get('/mypage/entry', 'UserController@entry')->name('entry');

    /* --------------------------------------------------------------------------
    企業用管理
    --------------------------------------------------------------------------*/
    Route::get('/company/home', 'CompanyController@company')->name('company');
    Route::get('/company/login', 'CompanyController@companyLogin')->name('companyLogin');
    Route::get('/company/reset', 'CompanyController@companyReset')->name('companyReset');
    Route::get('/company/confirm', 'CompanyController@companyConfirm')->name('companyConfirm');
    Route::get('/company/sent', 'CompanyController@companySent')->name('companySent');
    // お知らせ
    Route::get('/company/information', 'CompanyController@companyInformation')->name('companyInformation');
    Route::get('/company/information/detail', 'CompanyController@companyInformationDetail')->name('companyInformationDetail');
    // メッセージ
    Route::get('/company/message', 'CompanyController@companyMessage')->name('companyMessage');
    Route::get('/company/message/detail', 'CompanyController@companyMessageDetail')->name('companyMessageDetail');
    // 企業 求職者検索
    Route::get('/company/search', 'CompanyController@companySearch')->name('companySearch');
    Route::get('/company/user', 'CompanyController@companySearchUser')->name('companySearchUser');
    Route::get('/company/user/scout', 'CompanyController@companySearchUserScout')->name('companySearchUserScout');
    Route::get('/company/user/confirm', 'CompanyController@companySearchUserConfirm')->name('companySearchUserConfirm');
    Route::get('/company/user/complete', 'CompanyController@companySearchUserComplete')->name('companySearchUserComplete');
    // 企業 求人
    Route::get('/company/entry', 'CompanyController@companyEntry')->name('companyEntry');
    Route::get('/company/entry/detail', 'CompanyController@companyEntryDetail')->name('companyEntryDetail');
    Route::get('/company/entry/edit', 'CompanyController@companyEntryEdit')->name('companyEntryEdit');
    Route::get('/company/entry/create', 'CompanyController@companyEntryCreate')->name('companyEntryCreate');
    // 企業 お知らせ
    Route::get('/company/post', 'CompanyController@companyPost')->name('companyPost');
    Route::get('/company/post/edit', 'CompanyController@companyPostEdit')->name('companyPostEdit');
    Route::get('/company/post/create', 'CompanyController@companyPostCreate')->name('companyPostCreate');
    // 企業 各種設定
    Route::get('/company/setting/edit', 'CompanyController@companyEdit')->name('companyEdit');
    Route::get('/company/setting/account', 'CompanyController@companyAccount')->name('companyAccount');
    Route::get('/company/setting/account/create', 'CompanyController@companyAccountCreate')->name('companyAccountCreate');
    Route::get('/company/setting/account/edit', 'CompanyController@companyAccountEdit')->name('companyAccountEdit');
    Route::get('/company/setting/account/pw', 'CompanyController@companyAccountPw')->name('companyAccountPw');
    Route::get('/company/setting', 'CompanyController@companySetting')->name('companySetting');
    Route::get('/company/setting/template', 'CompanyController@companyTemplate')->name('companyTemplate');
    Route::get('/company/setting/template/create', 'CompanyController@companyTemplateCreate')->name('companyTemplateCreate');
    Route::get('/company/setting/template/edit', 'CompanyController@companyTemplateEdit')->name('companyTemplateEdit');
    Route::get('/company/setting/ip', 'CompanyController@companyIp')->name('companyIp');
    Route::get('/company/setting/billing', 'CompanyController@companyBilling')->name('companyBilling');
    Route::get('/company/setting/block', 'CompanyController@companyBlock')->name('companyBlock');

    /* --------------------------------------------------------------------------
    システム管理
    --------------------------------------------------------------------------*/
    Route::get('/admin/home', 'AdminController@admin')->name('admin');
    Route::get('/admin/login', 'AdminController@adminLogin')->name('adminLogin');
    Route::get('/admin/reset', 'AdminController@adminReset')->name('adminReset');
    Route::get('/admin/confirm', 'AdminController@adminConfirm')->name('adminConfirm');
    Route::get('/admin/sent', 'AdminController@adminSent')->name('adminSent');
    // おしらせ
    Route::get('/admin/information', 'AdminController@adminInformation')->name('adminInformation');
    Route::get('/admin/information/detail', 'AdminController@adminInformationDetail')->name('adminInformationDetail');
    // 企業
    Route::get('/admin/company', 'AdminController@adminCompany')->name('adminCompany');
    Route::get('/admin/company/detail', 'AdminController@adminCompanyDetail')->name('adminCompanyDetail');
    Route::get('/admin/company/create', 'AdminController@adminCompanyCreate')->name('adminCompanyCreate');
    Route::get('/admin/company/entry', 'AdminController@adminCompanyEntry')->name('adminCompanyEntry');
    Route::get('/admin/company/entry/edit', 'AdminController@adminCompanyEntryEdit')->name('adminCompanyEntryEdit');
    Route::get('/admin/company/entry/create', 'AdminController@adminCompanyEntryCreate')->name('adminCompanyEntryCreate');
    Route::get('/admin/company/post', 'AdminController@adminCompanyPost')->name('adminCompanyPost');
    Route::get('/admin/company/post/edit', 'AdminController@adminCompanyPostEdit')->name('adminCompanyPostEdit');
    Route::get('/admin/company/post/create', 'AdminController@adminCompanyPostCreate')->name('adminCompanyPostCreate');
    // 企業 各種設定
    Route::get('/admin/company/edit', 'AdminController@adminCompanyEdit')->name('adminCompanyEdit');
    Route::get('/admin/company/account', 'AdminController@adminCompanyAccount')->name('adminCompanyAccount');
    Route::get('/admin/company/account/create', 'AdminController@adminCompanyAccountCreate')->name('adminCompanyAccountCreate');
    Route::get('/admin/company/account/edit', 'AdminController@adminCompanyAccountEdit')->name('adminCompanyAccountEdit');
    Route::get('/admin/company/account/pw', 'AdminController@adminCompanyAccountPw')->name('adminCompanyAccountPw');
    Route::get('/admin/company/template', 'AdminController@adminCompanyTemplate')->name('adminCompanyTemplate');
    Route::get('/admin/company/template/create', 'AdminController@adminCompanyTemplateCreate')->name('adminCompanyTemplateCreate');
    Route::get('/admin/company/template/edit', 'AdminController@adminCompanyTemplateEdit')->name('adminCompanyTemplateEdit');
    Route::get('/admin/company/ip', 'AdminController@adminCompanyIp')->name('adminCompanyIp');
    Route::get('/admin/company/billing', 'AdminController@adminCompanyBilling')->name('adminCompanyBilling');
    Route::get('/admin/company/block', 'AdminController@adminCompanyBlock')->name('adminCompanyBlock');
    // ユーザー
    Route::get('/admin/user', 'AdminController@adminUser')->name('adminUser');
    Route::get('/admin/user/detail', 'AdminController@userDetail')->name('userDetail');
    Route::get('/admin/user/message', 'AdminController@userMessage')->name('userMessage');
    Route::get('/admin/user/create', 'AdminController@userCreate')->name('userCreate');
    Route::get('/admin/user/edit1', 'AdminController@userEdit1')->name('userEdit1');
    Route::get('/admin/user/edit2', 'AdminController@userEdit2')->name('userEdit2');
    Route::get('/admin/user/edit3', 'AdminController@userEdit3')->name('userEdit3');
    Route::get('/admin/user/pw', 'AdminController@userPw')->name('userPw');
    Route::get('/admin/user/ban', 'AdminController@userBan')->name('userBan');
    Route::get('/admin/user/favorite', 'AdminController@userFavorite')->name('userFavorite');
    Route::get('/admin/user/entry', 'AdminController@userEntry')->name('userEntry');
    Route::get('/admin/user/curiosity', 'AdminController@userCuriosity')->name('userCuriosity');
    Route::get('/admin/user/scout', 'AdminController@userScout')->name('userScout');
    // お問い合わせ
    Route::get('/admin/contact', 'AdminController@adminContact')->name('adminContact');
    Route::get('/admin/contact/detail', 'AdminController@adminContactDetail')->name('adminContactDetail');
    // メッセージ
    Route::get('/admin/message', 'AdminController@adminMessage')->name('adminMessage');
    Route::get('/admin/message/detail', 'AdminController@adminMessageDetail')->name('adminMessageDetail');
    Route::get('/admin/message/create', 'AdminController@adminMessageCreate')->name('adminMessageCreate');
    // マスター
    Route::get('/admin/master', 'AdminController@adminMaster')->name('adminMaster');
    Route::get('/admin/master/create', 'AdminController@adminMasterCreate')->name('adminMasterCreate');
    Route::get('/admin/master/edit', 'AdminController@adminMasterEdit')->name('adminMasterEdit');
    // 記事投稿
    Route::get('/admin/post', 'AdminController@adminPost')->name('adminPost');
    Route::get('/admin/post/detail', 'AdminController@adminPostDetail')->name('adminPostDetail');
    Route::get('/admin/post/create', 'AdminController@adminPostCreate')->name('adminPostCreate');
    Route::get('/admin/post/edit', 'AdminController@adminPostEdit')->name('adminPostEdit');
    // 設定
    Route::get('/admin/setting', 'AdminController@adminSetting')->name('adminSetting');
    Route::get('/admin/setting/edit1', 'AdminController@adminSettingEdit1')->name('adminSettingEdit1');
    Route::get('/admin/setting/edit2', 'AdminController@adminSettingEdit2')->name('adminSettingEdit2');
    Route::get('/admin/setting/edit3', 'AdminController@adminSettingEdit3')->name('adminSettingEdit3');
    Route::get('/admin/setting/edit4', 'AdminController@adminSettingEdit4')->name('adminSettingEdit4');
    Route::get('/admin/setting/edit5', 'AdminController@adminSettingEdit5')->name('adminSettingEdit5');
  }
);