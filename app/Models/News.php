<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'newsID',
        'title',
        'picture',
        'description',
        'newsCategoryID',
        'seen',
        'like',
    ];
    public function N_Category()
    {
        return $this->hasOne(newsCategory::class , 'newsCategoryID','newsCategoryID');
    }
}
