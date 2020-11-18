<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintucTable extends Model
{
    protected $table='news';
    protected $primaryKey = 'id_news';
    protected $fillable = [
        'id_user', 'url_img_news', 'views','likes','title','content','short_content','created_at','updated_at'
    ];
    public $timestamps = true;
}
