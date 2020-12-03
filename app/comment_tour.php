<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment_tour extends Model
{
    protected $table='comment_tour';
    protected $primaryKey = 'id_comment_tours';
    protected $fillable = [
        'id_tour','id_user','content','rating','created_at','updated_at'
    ];
    public $timestamps = false;
}
