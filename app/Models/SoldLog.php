<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldLog extends Model
{
    use HasFactory;
    protected $table = 'tbl_log_sold';
    protected $fillable = [
      'sold_id',
      'station_id',
      'product_id'
    ];
    protected $primaryKey = ['sold_id'];
}
