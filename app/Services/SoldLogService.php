<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\SoldLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoldLogService{
  public function saveLog($station_id,$product_id){
    DB::beginTransaction();
    try{
      $array = [
        'station_id' => $station_id,
        'product_id' => $product_id
      ];
      SoldLog::upsert($array,['sold_id']);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}