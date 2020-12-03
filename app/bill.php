<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table='bill';
    protected $primaryKey = 'id_bill';
    protected $fillable = [
        'id_user', 'id_tour', 'id_coupon','id_doitac','id_payment','quantity_adults','quantity_children','total_price','note','status','created_at','updated_at'
    ];
    public $timestamps = true;
}
