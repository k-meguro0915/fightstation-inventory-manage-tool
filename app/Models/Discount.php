<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'tbl_discount';
    protected $fillable = [
      'station_id',
      'product_id',
      'rate',
      'start_date',
      'end_date',
    ];
    protected $primaryKey = ['station_id','product_id'];
}
