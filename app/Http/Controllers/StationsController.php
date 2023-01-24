<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StationService;
use App\Services\ProductService;
use App\Services\InventoryService;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class StationsController extends Controller
{
    private $service;
    public function __construct(StationService $service)
    {
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
    public function create(){
      $products_service = new ProductService;
      $products = $products_service->all();
      $company_service = new CompanyService;
      $company = $company_service->all();
      return view('CreateStation',[
        'products' => $products,
        'input_field' => 10,
        'company' => $company
      ]);
    }
    public function edit($station_id){
      $products_service = new ProductService;
      $products = $products_service->all();
      $company_service = new CompanyService;
      $company = $company_service->all();
      $inventory_service = new InventoryService;
      $inventory = $inventory_service->get($station_id);
      $ret = $this->service->get($station_id);
      return view('EditStation',[
        'inventory' => $inventory,
        'products' => $products,
        'station' => $ret[0]->getAttributes(),
        'input_field' => 10,
        'company' => $company,
      ]);
    }
    public function confirm(Request $request){
      $this->validate($request, [
        'company_id' => 'required',
      ]);
      $products_service = new ProductService;
      $products = $products_service->all();
      $company_service = new CompanyService;
      $company = $company_service->get($request->company_id);
      return view('ConfirmStation',[
        'confirm' => $request,
        'products' => $products,
        'company' => $company[0]->getAttributes(),
      ]);
    }
    public function commit(Request $request){
      $ret = $this->service->create($request);
      $message = $ret == 'true' ? '登録が完了しました。' : $ret;
      return redirect('/stations')->with('flash_message',$message);
    }
    public function update(Request $request){
      $ret = $this->service->update($request);
      $message = $ret == 'true' ? '登録が完了しました。' : $ret;
      return redirect('/stations')->with('flash_message',$message);
    }
    public function delete($station_id){
      $ret = $this->service->delete($station_id);
      $message = $ret == 'true' ? '登録が完了しました。' : $ret;
      return redirect('/stations')->with('flash_message',$message);
    }
}
