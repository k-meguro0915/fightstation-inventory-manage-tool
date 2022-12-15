<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;

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
    return view('CreateCompany');
  }
  public function edit($company_id){
    $company = $this->service->get($company_id);
    return view('EditCompany',[
      "company" => $company[0]->getAttributes()
    ]);
  }
  public function confirm(Request $request){
    return view('ConfirmCompany',[
      "confirm" => $request
    ]);
  }
  public function commit(Request $request){
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '登録が完了しました。' : $ret;
    return redirect('/company')->with('flash_message',$message);
  }
}
