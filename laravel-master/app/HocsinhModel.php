<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocsinhModel extends Model
{
    protected $table = 'hocsinh';
    protected $fillable = ['hoten','toan','ly','hoa'];
    public $timestamps = false;
}
