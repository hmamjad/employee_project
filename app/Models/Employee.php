<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_name',
        'emp_phone',
        'emp_email',
        'emp_location',
        'emp_dep',
        'emp_desig',
        'emp_joinDate',
        'emp_salary',
        'status',
    ];
}








