<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $table='slider';
    protected $primaryKey = 'id_slider';
    protected $fillable = [
        'title','url_img_slider','content'
    ];
}
