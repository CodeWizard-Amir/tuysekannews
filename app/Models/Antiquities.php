<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antiquities extends Model
{
    use HasFactory;
    protected $fillable = [
        'AntiquitiyID',
        'name',
        'picture',
        'description',
        'categoryID',
    ];
}
