<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class UserService{
  public function all(){
    $ret = [];
    $rv = User::orderBy('id','asc')->get();
    return $rv;
  }
  public function get($user_id){
    $ret = User::where('id',$user_id)->get();
    return $ret;
  }
  public function commit($request){
    DB::beginTransaction();
    try{
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
      ]);
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function update($request){
    DB::beginTransaction();
    try{
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
      ]);
      User::where('id',intval($request->id))->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function commit_email($request){
    DB::beginTransaction();
    try{
      $request->validate([
        'email' => ['required', 'string', 'max:255'],
      ]);
      $item = [
        'id' => $request->id,
        'email' => $request->email,
      ];
      User::where(['id'=>$request->id])->update(['email'=>$request->email]);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function delete($user_id){
    DB::beginTransaction();
    try{
      User::where(['id'=>$user_id])->delete();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
}