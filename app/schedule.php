<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $table='schedule';
    protected $primaryKey = 'id_schedule';
    protected $fillable = [
        'content','id_tour',
    ];
    public $timestamps=false;
}
