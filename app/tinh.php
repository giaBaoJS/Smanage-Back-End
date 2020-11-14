<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    protected $table='tinh';
    protected $primaryKey = 'id_tinh';
    protected $fillable = [
        'name'
    ];
}
