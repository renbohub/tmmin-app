<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LUser extends Model
{
    use HasFactory;
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
