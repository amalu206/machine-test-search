<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{

    protected $fillable = [
        'name',
        'department_id',
        'designation_id',
        'phone_number'
    ];


    use HasFactory;
}
