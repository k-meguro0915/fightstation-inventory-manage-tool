<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス呼び出し
use App\Services\StationService;
use App\Services\ProductService;
use App\Services\InventoryService;
class APIController extends Controller
{
    protected $error_msg_key = 'wrong or nothing API Key';
    //
    private function checkAPIKey($request){
      $key = $request->key;
      if($key == '3fpe8F9e_9KdJFHE88YL'){
        return true;
      }
      return false;
    }
    public function decreaseInventory(Request $request){
      try{
        if($this->checkAPIKey($request)){
          $service = new InventoryService;
          $ret = $service->decrease($request->station_id, $request->product_id);
          $result = [
            'result' => $ret
          ];
        } else {
          $result = [
            'result' => false,
            'error' => [
                'messages' => ['wrong or nothing API Key']
            ],
          ];
        }
      } catch(\Exception $e){
        $result = [
            'result' => false,
            'error' => [
                'messages' => [$e->getMessage()]
            ],
        ];
        return $this->resConversionJson($result, $e->getCode());
      }
      return $this->resConversionJson($result);
    }
    public function getStation(Request $request){
      try{
        if($this->checkAPIKey($request)){
          $service = new StationService;
          $ret = $service->apiAll();
          $result = [
            'result' => $ret
          ];
        } else {
          $result = [
            'result' => false,
            'error' => [
                'messages' => ['wrong or nothing API Key']
            ],
          ];
        }
      } catch(\Exception $e){
        $result = [
            'result' => false,
            'error' => [
                'messages' => [$e->getMessage()]
            ],
        ];
        return $this->resConversionJson($result, $e->getCode());
      }
      return $this->resConversionJson($result);
    }
    public function getStationDetail(Request $request){
      try{
        if($this->checkAPIKey($request)){
          $service = new StationService;
          $ret['station'] = $service->apiGet($request->station_id);
          $service = new InventoryService;
          $ret['inventory'] = $service->apiGet($request->station_id);
          $result = [
            'result' => [
              'station' => $ret['station'],
              'inventory' => $ret['inventory'],
            ]
          ];
        } else {
          $result = [
            'result' => false,
            'error' => [
                'messages' => ['wrong or nothing API Key']
            ],
          ];
        }
      } catch(\Exception $e){
        $result = [
            'result' => false,
            'error' => [
                'messages' => [$e->getMessage()]
            ],
        ];
        return $this->resConversionJson($result, $e->getCode());
      }
      return $this->resConversionJson($result);
    }
    public function getDatabaseVersion(Request $request){
      try{
        if($this->checkAPIKey($request)){
          $service = new DataVersionService;
          $ret = $service->get();
          $result = [
            'result' => $ret
          ];
        } else {
          $result = [
            'result' => false,
            'error' => [
                'messages' => ['wrong or nothing API Key']
            ],
          ];
        }
      } catch(\Exception $e){
        $result = [
            'result' => false,
            'error' => [
                'messages' => [$e->getMessage()]
            ],
        ];
        return $this->resConversionJson($result, $e->getCode());
      }
      return $this->resConversionJson($result);
    }
    // jsonにコンバートかつステータスコードを返却する
    private function resConversionJson($result, $statusCode=200){
      if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
        $statusCode = 500;
      }
      return response()->json(
        $result,
        $statusCode,
        ['Content-Type' => 'application/json;charset=UTF-8','Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE
      );
    }
}
