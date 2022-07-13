<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
  public function companyLogin(){return view('company/auth/login');}
  public function companyReset(){return view('company/auth/reset');}
  public function companySent(){return view('company/auth/sent');}
  
  public function company(){return view('company/index');}

  public function companySearch(){return view('company/search/index');}
  public function companySearchUser(){return view('company/search/user');}
  public function companySearchUserScout(){return view('company/search/scout');}
  public function companySearchUserConfirm(){return view('company/search/confirm');}
  public function companySearchUserComplete(){return view('company/search/complete');}
  public function companyPost(){return view('company/post/index');}
  public function companyPostCreate(){return view('company/post/create');}
  public function companyPostEdit(){return view('company/post/edit');}

  public function companyMessage(){return view('company/message/index');}
  public function companyMessageDetail(){return view('company/message/detail');}

  public function companyInformation(){return view('company/information/index');}
  public function companyInformationDetail(){return view('company/information/detail');}

  public function companyEntry(){return view('company/entry/index');}
  public function companyEntryDetail(){return view('company/entry/detail');}
  public function companyEntryCreate(){return view('company/entry/create');}
  public function companyEntryEdit(){return view('company/entry/edit');}

  public function companySetting(){return view('company/setting/index');}
  public function companyEdit(){return view('company/setting/edit');}
  public function companyTemplate(){return view('company/setting/template/index');}
  public function companyTemplateCreate(){return view('company/setting/template/create');}
  public function companyTemplateEdit(){return view('company/setting/template/edit');}
  public function companyBilling(){return view('company/setting/billing');}
  public function companyBlock(){return view('company/setting/block');}
  public function companyIp(){return view('company/setting/ip');}

  public function companyAccount(){return view('company/setting/account/index');}
  public function companyAccountCreate(){return view('company/setting/account/create');}
  public function companyAccountEdit(){return view('company/setting/account/edit');}
  public function companyAccountPw(){return view('company/setting/account/pw');}
  
}