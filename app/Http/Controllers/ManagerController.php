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
  public function edit($user_id){
    $user = $this->service->get($user_id);
    return view('EditManager',[
      'manager' => $user[0]->getAttributes()
    ]);
  }
  public function update(Request $request){
    $this->validation($request);
    $ret = $this->service->update($request);
    $message = $ret == 'true' ? '管理者の情報を更新しました。' : $ret;
    return redirect('/managers');
  }
  public function commit(Request $request){
    $this->validation($request);
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '管理者を追加しました。' : $ret;
    return redirect('/managers');
  }
  public function delete($user_id){
    $ret = $this->service->delete($user_id);
    $message = $ret == 'true' ? '管理者の情報を更新しました。' : $ret;
    return redirect('/managers');
  }
  private function validation($request){
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'password_confirmation' => 'required|same:password'
    ]);
  }
}
