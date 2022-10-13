<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNewletter extends Model
{
    use HasFactory;

    protected $fillable = ['email'];
}
