<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table='tours';
    protected $primaryKey = 'id_tour';
    protected $fillable = [
        'id_schedule','id_tinh', 'id_doitac', 'name_tour','rate','time','price','price_children','url_img_tour','discount','status','quantity_limit','date_start','date_end','vehicle','url_gallery_tours','short_content','created_at','updated_at'
    ];
    public $timestamps = true;
}
