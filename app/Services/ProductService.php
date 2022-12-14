<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService{
  public function all(){
    $ret = [];
    $rv = Product::orderBy('product_id','asc')->get();
    return $rv;
  }
  public function edit($product_id){
    $ret = Product::where('product_id',$product_id)->get();
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      $item=[
        'product_id' => $request->product_id,
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_point' => $request->product_point,
      ];
      Product::upsert($item,['product_id']);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}