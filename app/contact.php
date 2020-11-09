<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table='contact';
    protected $primaryKey = 'id_contact';
    protected $fillable = [
        'name', 'email', 'content'
    ];
}
