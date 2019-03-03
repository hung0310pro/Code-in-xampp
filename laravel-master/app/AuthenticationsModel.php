<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthenticationsModel extends Model
{
    protected $table = 'thanh_vien';
    protected $fillable = ['user','password','level'];
    public $timestamps = false;

}
