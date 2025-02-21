<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Verifytoken extends Model
{
    //
    use HasFactory;
    protected $fillable = ['token', 'email', 'is_activated'];
}
