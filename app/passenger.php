<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class passenger extends Model
{
    protected $table='passenger';
    protected $primaryKey = 'id_passenger';
    protected $fillable = [
       'id_bill','name_passenger', 'address_passenger', 'phone_passenger','gender_passenger','country_passenger','passport_passenger'
    ];
    public $timestamps = false;
}
