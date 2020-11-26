<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    public $timestamps = false;
    protected $table='contact';
    protected $primaryKey = 'id_contact';
    protected $fillable = [
        'name', 'email', 'content'
    ];
}
