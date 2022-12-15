<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementCompany extends Model
{
    use HasFactory;
    protected $table = 'tbl_implementing_company';
    protected $fillable = [
      'company_id',
      'prefecture',
      'address'
    ];
    protected $primaryKey = ['company_id'];
}
