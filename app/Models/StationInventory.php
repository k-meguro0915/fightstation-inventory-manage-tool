<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StationInventory extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'tbl_station_inventory';
    protected $fillable = [
      'inventory_id',
      'station_id',
      'product_id',
      'inventory',
      'current_inventory'
    ];
    protected $primaryKey = ['inventory_id'];
}
