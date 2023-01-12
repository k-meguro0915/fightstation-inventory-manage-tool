<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImplementCompany extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_implementing_company';
    protected $fillable = [
      'company_id',
      'manager_id',
      'prefecture',
      'address',
    ];
    protected $primaryKey = ['company_id'];
}
