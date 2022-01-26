<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_id','product_name','product_category','product_subcategory','product_price','product_description','product_image','product_status'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        //TODO::optimize here, put this condition inside scope fun,
        // $logged_in_user_customer_id = (Auth::check()) ? Auth::user()->user_customer_id : null;
        $role = Session::get('shopowner_role');
        if($role == 'User')
		{
		    // Return all projects which is related to customer even not have any portfolio
			static::addGlobalScope('assigned_projects', function (Builder $builder) {
			    $builder->where('product_status', '=',1);
			});
		}
	}
}
