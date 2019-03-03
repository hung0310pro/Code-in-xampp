<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newmodel extends Model
{
    //table làm việc vs model
    protected $table = 'bangmodeltest'; //(đây là bảng trong csdl)

    // các cột hiển thi dữ liệu
    protected $fillable = ['id','name','diachi'];

    // các cột ẩn hiển thị dữ liệu
    protected $hidden = ['password','time'];
}
