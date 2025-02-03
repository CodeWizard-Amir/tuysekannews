<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebrities extends Model
{
    use HasFactory;
    protected $fillable = [
        'celebrityID',
        'name',
        'job',
        'picture',
        'description',
    ];
}
