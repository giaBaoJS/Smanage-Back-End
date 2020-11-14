<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallerytable extends Model
{
    protected $table='gallery';
    protected $primaryKey = 'id_gallery';
    protected $fillable = [
        'title', 'url_img_gallery'
    ];
}
