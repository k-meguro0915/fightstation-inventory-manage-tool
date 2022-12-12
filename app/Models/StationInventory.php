<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationInventory extends Model
{
    use HasFactory;
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
