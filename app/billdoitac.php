<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billdoitac extends Model
{
    protected $table='billdoitac';
    protected $primaryKey = 'id_billdoitac';
    protected $fillable = [
        'id_user', 'id_doitac', 'price_billdoitac','catalog_doitac'
    ];
    public $timestamps=false;
}
