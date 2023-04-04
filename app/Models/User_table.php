<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_table extends Model
{
    use HasFactory;

    protected $table = "users";    
    protected $tablefild = ['name', 'Mobile_No','email'];
}
