<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\UserService;

class CompanyController extends Controller
{
  //
  private $service;
  public function __construct(CompanyService $service)
  {
    $this->service = $service;
  }
  public function index(){
    $list = $this->service->all();
    return view('ListCompany',[
      "company" => $list
    ]);
  }
  public function create(){
    $user_service = new UserService;
    $user = $user_service->all();
    return view('CreateCompany',[
      'managers' => $user
    ]);
  }
  public function edit($company_id){
    $company = $this->service->get($company_id);
    $user_service = new UserService;
    $user = $user_service->all();
    return view('EditCompany',[
      "company" => $company[0]->getAttributes(),
      'managers' => $user
    ]);
  }
  public function confirm(Request $request){
    $user_service = new UserService;
    $user = $user_service->get($request->manager_id);
    $this->validate($request, [
      'manager_id' => 'required',
      'company_name' => 'required',
    ]);
    return view('ConfirmCompany',[
      "company" => $request,
      'manager' => $user[0]->getAttributes()
    ]);
  }
  public function commit(Request $request){
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '登録が完了しました。' : $ret;
    return redirect('/company')->with('flash_message',$message);
  }
  public function delete($company_id){
    $ret = $this->service->delete($company_id);
    $message = $ret == 'true' ? '削除が完了しました。' : $ret;
    return redirect('/company')->with('flash_message',$message);
  }
}
