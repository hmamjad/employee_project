<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Location;

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


    // Join with Location
    public function location(){
        return $this->belongsTo(Location::class,'id');
    }
    // Join with Depatment
    public function department(){
        return $this->belongsTo(Location::class,'id');
    }
    // Join with Designation
    public function designation(){
        return $this->belongsTo(Location::class,'id');
    }
}








