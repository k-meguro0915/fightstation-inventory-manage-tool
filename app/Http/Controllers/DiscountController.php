<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DiscountService;

class DiscountController extends Controller
{
  private $service;
  public function __construct(DiscountService $service)
  {
    $this->service = $service;
  }
  public function discount($station_id){
    $inventory = $this->service->getFromStation($station_id);
    return view('EditDiscount',[
      'inventory' => $inventory,
    ]);
  }
  public function discountCommit(Request $request){
    $ret = $this->service->commit($request);
    $message = $ret == 'true' ? '登録が完了しました。' : $ret;
    return redirect('/inventory')->with('flash_message',$message);
  }
}
