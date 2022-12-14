<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';
    protected $fillable = [
      'product_id',
      'product_name',
      'product_price',
      'product_point'
    ];
    protected $primaryKey = ['product_id'];

}
