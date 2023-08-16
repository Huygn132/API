<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TProjectPlanActual extends Model
{
    protected $table = 't_project_plan_actuals';

    protected $fillable = [
        'project_id',
        'staff_id',
        'month',
        'planned_hours',
        'actual_hours',
        'planned_budget',
        'actual_budget',
        'planned_internal_cost',
        'actual_internal_cost',
        'created_user',
        'updated_user',
        'created_datetime',
        'updated_datetime',
    ];

    protected $casts = [
        'created_datetime' => 'datetime',
        'updated_datetime' => 'datetime',
    ];
}
