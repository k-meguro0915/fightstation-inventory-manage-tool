<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_station';
    protected $fillable = [
      'company_id',
      'station_name'
    ];
    protected $primaryKey = ['station_id'];
}
