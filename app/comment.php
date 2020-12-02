<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table='comment';
    protected $primaryKey = 'id_comment';
    protected $fillable = [
        'id_news','id_user','content','rating','created_at','updated_at'
    ];
    public $timestamps = false;
}
