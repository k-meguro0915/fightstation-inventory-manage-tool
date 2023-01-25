<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\StationInventory;
use App\Models\Station;
use App\Models\ReplenishmentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryService{
  public function all(){
    $ret = [];
    $ret = Station::select([
              'tbl_implementing_company.company_name',
              'tbl_station.station_id',
              'tbl_station.station_name',
              'users.name',DB::raw('MAX(tbl_log_replenishment.updated_at) as updated_at')
            ])
            ->leftjoin('tbl_log_replenishment','tbl_log_replenishment.station_id','=','tbl_station.station_id')
            ->join('tbl_implementing_company','tbl_implementing_company.company_id','=','tbl_station.company_id')
            ->join('users','tbl_implementing_company.manager_id','=','users.id')
            ->whereNull('tbl_implementing_company.deleted_at')
            ->groupBy('tbl_station.station_id')
            ->get();
    return $ret;
  }
  public function manage_list($manager_id){
    $ret = Station::select([
              'tbl_implementing_company.company_name',
              'tbl_station.station_id',
              'tbl_station.station_name',
              'tbl_log_replenishment.updated_at'
            ])
            ->where('tbl_implementing_company.manager_id',$manager_id)
            ->leftjoin('tbl_log_replenishment','tbl_log_replenishment.station_id','=','tbl_station.station_id')
            ->join('tbl_implementing_company','tbl_implementing_company.company_id','=','tbl_station.company_id')
            ->get();
    return $ret;
  }
  public function get($station_id){
    $ret = StationInventory::select([
              'tbl_product.product_name',
              'tbl_station_inventory.product_id',
              'tbl_station_inventory.station_id',
              'tbl_station_inventory.inventory',
              'tbl_station_inventory.current_inventory',
              'tbl_log_replenishment.updated_at',
            ])
            ->where('tbl_station_inventory.station_id',$station_id)
            ->join('tbl_product','tbl_station_inventory.product_id','=','tbl_product.product_id')
            ->leftjoin('tbl_log_replenishment','tbl_log_replenishment.product_id','=','tbl_station_inventory.product_id')
            ->get();
    // $ret = DB::select("
    //   SELECT
    //     tbl_product.product_name,
    //     tbl_station_inventory.product_id,
    //     tbl_station_inventory.station_id,
    //     tbl_station_inventory.inventory,
    //     tbl_station_inventory.current_inventory,
    //     tbl_log_replenishment.updated_at
    //   FROM
    //     tbl_station_inventory
    //   INNER JOIN 
    //     tbl_product ON tbl_station_inventory.product_id = tbl_product.product_id
    //   LEFT OUTER JOIN 
    //       tbl_log_replenishment ON tbl_log_replenishment.station_id = tbl_station_inventory.station_id
    //     AND 
    //       tbl_log_replenishment.product_id = tbl_station_inventory.product_id
    //   WHERE
    //     tbl_station_inventory.station_id = ?
    //   ",[$station_id]);
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      $stationId="";
      foreach($request->inventory as $key => $value){
        $stationId = $value['station_id'];
        $item=[
          'station_id' => $value['station_id'],
          'product_id' => $value['product_id'],
          'current_inventory' => $value['inventory'],
        ];
        StationInventory::where([['station_id', $value['station_id']],['product_id', $value['product_id']]])->update(['current_inventory' => $value['inventory']]);
        // 補充する前後の在庫数に変動があった場合、ログを残す
        if($value['inventory'] != $value['current_inventory']){
          $array = [
            'station_id' => $value['station_id'],
            'product_id' => $value['product_id'],
            'quantity' => intval($value['inventory']) - intval($value['current_inventory'])
          ];
          ReplenishmentLog::upsert($array,['station_id','product_id']);
        }
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function apiGet($station_id){
    $rv = StationInventory::where('station_id',$station_id)->join('tbl_product','tbl_station_inventory.product_id','=','tbl_product.product_id')->get();
    $ret = $rv->map(function ($value){
      $station = [];
      $value = $value->getAttributes();
      $station['product_id']          = $value['product_id'];
      $station['product_name']        = $value['product_name'];
      $station['inventory']           = $value['inventory'];
      $station['current_inventory']   = $value['current_inventory'];
      return $station;
    });
    return $ret;
  }
  public function decrease($station_id,$product_id){
    DB::beginTransaction();
    try{
      StationInventory::where([['station_id', $station_id],['product_id', $product_id]])->decrement('current_inventory',1);
      // 在庫の全体量をチェック
      // 現在庫が全体量の20％を切っていたら通知を飛ばす
      
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}