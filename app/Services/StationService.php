<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Station;
use App\Models\StationInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationService{
  public function all(){
    $ret = [];
    $ret = Station::get();
    return $ret;
  }
  public function get($station_id){
    $ret = Station::where('station_id',$station_id)->get();
    return $ret;
  }
  public function manage_list($manager_id){
    $ret = Station::where('manager_id',$manager_id)->join('tbl_log_replenishment','tbl_log_replenishment.station_id','=','tbl_station.station_id')->get();
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      $item=[
        'station_id' => $request->station_id,
        'company_id' => $request->company_id,
        'station_name' => $request->station_name,
      ];
      Station::upsert($item,['station_id']);
      StationInventory::where('station_id',$request->station_id)->delete();
      foreach($request->inventory as $key => $value){
        $item=[
          'station_id' => $request->station_id,
          'product_id' => $value['product_id'],
          'inventory' => $value['inventory'],
          'current_inventory' => $value['inventory'],
        ];
        StationInventory::upsert($item,['station_id','product_id']);
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function delete($station_id){
    DB::beginTransaction();
    try{
      Station::where(['station_id'=>$station_id])->delete();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function apiAll(){
    $rv = Station::orderBy('station_id','asc')->get();
    $ret = $rv->map(function ($value){
      $station = [];
      $value = $value->getAttributes();
      $station['station_id']     = $value['station_id'];
      $station['station_name']   = $value['station_name'];
      $station['prefecture']     = $value['prefecture'];
      $station['address']        = $value['address'];
      return $station;
    });
    return $ret;
  }
  public function apiGet($station_id){
    $rv = Station::where('station_id',$station_id)->get();
    $ret = $rv->map(function ($value){
      $station = [];
      $value = $value->getAttributes();
      $station['station_id']     = $value['station_id'];
      $station['station_name']   = $value['station_name'];
      $station['prefecture']     = $value['prefecture'];
      $station['address']        = $value['address'];
      return $station;
    });
    return $ret;
  }
}