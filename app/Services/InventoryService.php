<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\StationInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryService{
  public function all(){
    $ret = [];
    $rv = StationInventory::orderBy('product_id','asc')->get();
    return $rv;
  }
  public function get($station_id){
    $ret = StationInventory::where('station_id',$station_id)->join('tbl_product','tbl_station_inventory.product_id','=','tbl_product.product_id')->get();
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      foreach($request->inventory as $key => $value){
        $item=[
          'station_id' => $value['station_id'],
          'product_id' => $value['product_id'],
          'current_inventory' => $value['inventory'],
        ];
        StationInventory::where([['station_id', $value['station_id']],['product_id', $value['product_id']]])->update(['current_inventory' => $value['inventory']]);
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
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}