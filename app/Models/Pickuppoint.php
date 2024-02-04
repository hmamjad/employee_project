<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickuppoint extends Model
{
    use HasFactory;

    protected $table = 'pickup_point'; // model and table name same na hole, chinar jonno table name bole dite hobe

    protected $fillable = [
        'pickup_point_name',
        'pickup_point_adddress',
        'pickup_point_phone',
        'pickup_point_phone_two',
    ];

}
