<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MStaffData extends Model
{
    protected $table = 'm_staff_datas';

    protected $fillable = [
        'staff_name',
        'staff_type',
        'del_flg',
        'created_datetime',
        'updated_datetime',
    ];

    protected $casts = [
        'created_datetime' => 'datetime',
        'updated_datetime' => 'datetime',
    ];
}
