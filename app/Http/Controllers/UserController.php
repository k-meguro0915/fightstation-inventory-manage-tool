<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    //
  private $service;
  public function __construct(UserService $service)
  {
    $this->service = $service;
  }
  public function edit_email($user_id){
    $ret = $this->service->get($user_id);
    return view('EditEmail',[
      "user" => $ret[0]->getAttributes()
    ]);
  }
  public function commit_email(Request $request){
    $ret = $this->service->commit_email($request);
    $message = $ret == 'true' ? '設定が完了しました' : $ret;
    return redirect('/stations')->with('flash_message',$message);
  }
}
