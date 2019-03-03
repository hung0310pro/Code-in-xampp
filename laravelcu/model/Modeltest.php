<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeltest extends Model
{
    protected $table = 'giao_vien';
    protected $fillable = ['id','mon_hoc','giao_vien','sdt'];
}
