<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $table = 'tbl_station';
    protected $fillable = [
      'station_id',
      'station_name',
      'prefecture',
      'address',
    ];
    protected $primaryKey = ['station_id'];
}
