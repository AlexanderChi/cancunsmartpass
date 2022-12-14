<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;
    protected $table= 'passes';
    protected $fillable = [
        'PassFolio',
        'UserId',
        'PassName',
        'PassLastName',
        'PassEmail',
        'PassPhone',
        'PassCountry',
        'PassCity',
        'PassExtraPerson',
        'PassTotalEP',
        'PassTotal',
        'PassStatus',
    ];
}
