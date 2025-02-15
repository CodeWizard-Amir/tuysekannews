<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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
    public function W_category()
    {
        return $this->hasOne(Category::class,'categoryID','categoryID');
    }
}
