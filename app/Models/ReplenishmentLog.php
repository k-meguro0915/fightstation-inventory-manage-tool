<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplenishmentLog extends Model
{
    use HasFactory;
    protected $table = 'tbl_log_replenishment';
    protected $fillable = [
      'station_id',
      'product_id',
      'quantity',
      'updated_at',
    ];
    protected $primaryKey = ['replenishment_id'];
}
