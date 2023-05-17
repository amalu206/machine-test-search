<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{

   protected $table = 'designations';

      protected $fillable = [
        'name'
    ];

    use HasFactory;

}
