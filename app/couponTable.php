<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class couponTable extends Model
{
    protected $table='coupon';
    protected $primaryKey = 'id_coupon';
    protected $fillable = [
        'code_coupon', 'status', 'id_user','id_doitac','price','quantity','date_start',
    ];
}
