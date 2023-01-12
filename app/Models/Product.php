<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tbl_product';
    protected $fillable = [
      'product_id',
      'jan_code',
      'product_name',
      'product_price',
      'product_point'
    ];
    protected $primaryKey = ['product_id'];

}
