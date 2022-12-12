<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InventoryService;

class InventoryController extends Controller
{
  //
  private $service;
  public function __construct(InventoryService $service)
  {
    // $this->middleware('auth');
    $this->service = $service;
  }
  public function check($station_id){
    $ret = $this->service->get($station_id);
    return view('CheckInventory',[
      'inventory' => $ret
    ]);
  }
  public function commit(Request $request){
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '現在の在庫数が変更されました。' : $ret;
    return redirect('/stations')->with('flash_message',$message);
  }
}
