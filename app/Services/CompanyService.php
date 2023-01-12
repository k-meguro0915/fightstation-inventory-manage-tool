<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\ImplementCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyService{
  public function all(){
    $ret = [];
    $rv = ImplementCompany::orderBy('company_id','asc')->get();
    return $rv;
  }
  public function get($company_id){
    $ret = ImplementCompany::where('company_id',$company_id)->get();
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      $item=[
        'company_id' => $request['company_id'],
        'manager_id' => $request['manager_id'],
        'company_name' => $request['company_name'],
        'prefecture' => $request['prefecture'],
        'address' => $request['address']
      ];
      ImplementCompany::upsert($item,['company_id']);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function delete($company_id){
    DB::beginTransaction();
    try{
      ImplementCompany::where(['company_id'=>$company_id])->delete();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}