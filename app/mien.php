<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mien extends Model
{
    protected $table='mien';
    protected $primaryKey = 'id_mien';
    protected $fillable = [
        'name_mien'
    ];
}
