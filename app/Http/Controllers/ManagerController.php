<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class ManagerController extends Controller
{
  private $service;
  public function __construct(UserService $service)
  {
    $this->service = $service;
  }
  public function index(){
    $list = $this->service->all();
    return view('ListManagers',[
      "managers" => $list
    ]);
  }
  public function create(){
    return view('CreateManager');
  }
  public function commit(Request $request){
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '管理者を追加しました。' : $ret;
    return redirect('/managers');
  }
}
