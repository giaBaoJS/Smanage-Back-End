<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    protected $table = 'tinh';
    protected $primaryKey = 'id_tinh';
    protected $foreignKey = 'id_mien';
    protected $fillable = [
        'name_tinh',
        'id_mien'
    ];
    public $timestamps = false;
}
