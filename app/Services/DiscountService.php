<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Discount;
use App\Models\StationInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountService{
  public function getFromStation($station_id){
    // $ret = StationInventory::where('tbl_station_inventory.station_id',$station_id)
    //         ->leftjoin('tbl_discount','tbl_discount.station_id','=','tbl_station_inventory.station_id')
    //         ->leftjoin('tbl_product','tbl_product.product_id','=','tbl_station_inventory.product_id')
    //         ->leftjoin('tbl_discount','tbl_product.product_id','=','tbl_discount.product_id')
    //         ->get();
    $ret = DB::select("
      SELECT
        tbl_product.product_name,tbl_product.product_id,tbl_product.product_price,tbl_discount.discount_rate,tbl_station_inventory.station_id
      FROM
        tbl_station_inventory
        INNER JOIN tbl_product ON tbl_product.product_id = tbl_station_inventory.product_id
        LEFT OUTER JOIN tbl_discount ON tbl_discount.station_id = tbl_station_inventory.station_id
        AND tbl_discount.product_id = tbl_product.product_id
      WHERE
        tbl_station_inventory.station_id = ?
        AND tbl_station_inventory.deleted_at IS NULL
      ",[$station_id]);
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      foreach($request->discount as $key => $value){
        $item=[
          'station_id' => $value['station_id'],
          'product_id' => $value['product_id'],
          'discount_rate' => $value['rate']
        ];
        Discount::upsert($item,['station_id','product_id']);
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}