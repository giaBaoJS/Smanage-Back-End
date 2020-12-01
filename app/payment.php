<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table='payment';
    protected $primaryKey = 'id_payment';
    protected $fillable = [
        'name_payment', 'img_payment'
    ];
    public $timestamps=false;
}
