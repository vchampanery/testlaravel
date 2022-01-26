<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderitem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'table_order_items';
    protected $primaryKey = 'order_items_id';
    protected $fillable = ['order_items_id','orders_id','product_id','qty','price_price'];
}
