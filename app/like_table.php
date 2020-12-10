<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like_table extends Model
{
  protected $table='like_table';
  protected $primaryKey = 'id_like';
  protected $fillable = [
      'id_tn','id_user','type'
  ];
  public $timestamps = false;
}
