<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopowner extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'shopowner';
    protected $primaryKey = 'shopowner_id';
    protected $fillable = ['shopowner_id','shopowner_name','shopowner_email','shopowner_role','shopowner_username','shopowner_password','shopowner_language','shopowner_currency','shopowner_active'];


}
