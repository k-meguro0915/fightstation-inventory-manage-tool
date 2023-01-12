<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Employee;
use App\Models\EmployeeSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeService{
  public function get_from_email($email){
    $ret = "";
    try{
      $ret = Employee::where(['email' => $email])->get();
    } catch (\Exception $e) {
      return $e->getMessage();
    }
    return $ret;
  }
  public function signUp($company_id, $passwd, $email){
    DB::beginTransaction();
    try{
      $hash_pass = "";
      // パスワードのハッシュ化
      $hash_pass = bcrypt($passwd);
      Employee::create([
        'company_id' => $company_id,
        'email' => $email,
        'password' => $hash_pass
      ]);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  public function logIn($email,$passwd){
    DB::beginTransaction();
    try{
      $employee = $this->get_from_email($email);
      $hash_pass = $employee->password;
      # 一致を確認
      if($hash_pass == password_verify($passwd)){
        # セッションID生成
        $this->saveSession($employee->employee_id, $email);
      }else{
        return 2;
      }
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return 'true';
  }
  private function saveSession($employee_id,$email){
    DB::beginTransaction();
    try{
      $today = date("Y/m/d-H:i:s");
      $session_original = $email . '-' . $today;
      $hash_session = bcrypt($session_original);
      // 一度セッションを破棄する
      $this->destroySession($employee_id);
      EmployeeSession::create([
        'employee_id' => $employee_id,
        'token' => $hash_session
      ]);
      DB::commit();
    } catch (\Exception $e) {
      DB::rollback();
      return $e->getMessage();
    }
    return $hash_session;
  }
  private function destroySession($employee_id){
    EmployeeSession::where(['employee_id' => $employee_id])->delete();
  }
}