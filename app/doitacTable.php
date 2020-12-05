<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doitacTable extends Model
{
    protected $table='doitac';
    protected $primaryKey = 'id_doitac';
    protected $fillable = [
        'name', 'address_doitac', 'phone_doitac','email_doitac','slogan','contract_date'
    ];
    public $timestamps=false;
}
