<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InventoryService;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
  //
  private $service;
  public function __construct(InventoryService $service)
  {
    // $this->middleware('auth');
    $this->service = $service;
  }
  public function index(){
    $userId = Auth::id();
    if($userId == 1){
      $list = $this->service->all();
    } else {
      $list = $this->service->manage_list($userId);
    }
    return view('StationInventory',[
      "stations" => $list
    ]);
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
    return redirect('/inventory')->with('flash_message',$message);
  }
}
