<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
  public function adminLogin(){return view('admin/auth/login');}
  public function adminReset(){return view('admin/auth/reset');}
  public function adminSent(){return view('admin/auth/sent');}
  
  public function admin(){return view('admin/index');}
  public function adminUser(){return view('admin/user/index');}
  public function userDetail(){return view('admin/user/detail');}
  public function userMessage(){return view('admin/user/message');}
  public function userCreate(){return view('admin/user/create');}
  public function userEdit1(){return view('admin/user/edit1');}
  public function userEdit2(){return view('admin/user/edit2');}
  public function userEdit3(){return view('admin/user/edit3');}
  public function userBan(){return view('admin/user/ban');}
  public function userPw(){return view('admin/user/pw');}
  public function userFavorite(){return view('admin/user/favorite');}
  public function userEntry(){return view('admin/user/entry');}
  public function userCuriosity(){return view('admin/user/curiosity');}
  public function userScout(){return view('admin/user/scout');}

  public function adminInformation(){return view('admin/information/index');}
  public function adminInformationDetail(){return view('admin/information/detail');}

  public function adminCompany(){return view('admin/company/index');}
  public function adminCompanyDetail(){return view('admin/company/detail');}
  public function adminCompanyCreate(){return view('admin/company/create');}
  public function adminCompanyEdit(){return view('admin/company/edit');}
  public function adminCompanyAccount(){return view('admin/company/account/index');}
  public function adminCompanyAccountCreate(){return view('admin/company/account/create');}
  public function adminCompanyAccountEdit(){return view('admin/company/account/edit');}
  public function adminCompanyAccountPw(){return view('admin/company/account/pw');}
  public function adminCompanyPost(){return view('admin/company/post/index');}
  public function adminCompanyPostCreate(){return view('admin/company/post/create');}
  public function adminCompanyPostEdit(){return view('admin/company/post/edit');}
  public function adminCompanyEntry(){return view('admin/company/entry/index');}
  public function adminCompanyEntryCreate(){return view('admin/company/entry/create');}
  public function adminCompanyEntryEdit(){return view('admin/company/entry/edit');}
  public function adminCompanyTemplate(){return view('admin/company/template/index');}
  public function adminCompanyTemplateCreate(){return view('admin/company/template/create');}
  public function adminCompanyTemplateEdit(){return view('admin/company/template/edit');}
  public function adminCompanyBilling(){return view('admin/company/billing');}
  public function adminCompanyBlock(){return view('admin/company/block');}
  public function adminCompanyIp(){return view('admin/company/ip');}
  
  public function adminContact(){return view('admin/contact/index');}
  public function adminContactDetail(){return view('admin/contact/detail');}

  public function adminMessage(){return view('admin/message/index');}
  public function adminMessageDetail(){return view('admin/message/detail');}
  public function adminMessageCreate(){return view('admin/message/create');}

  public function adminMaster(){return view('admin/master/index');}
  public function adminMasterCreate(){return view('admin/master/create');}
  public function adminMasterEdit(){return view('admin/master/edit');}

  public function adminPost(){return view('admin/post/index');}
  public function adminPostDetail(){return view('admin/post/detail');}
  public function adminPostCreate(){return view('admin/post/create');}
  public function adminPostEdit(){return view('admin/post/edit');}

  public function adminSetting(){return view('admin/setting/index');}
  public function adminSettingEdit1(){return view('admin/setting/edit1');}
  public function adminSettingEdit2(){return view('admin/setting/edit2');}
  public function adminSettingEdit3(){return view('admin/setting/edit3');}
  public function adminSettingEdit4(){return view('admin/setting/edit4');}
  public function adminSettingEdit5(){return view('admin/setting/edit5');}
}