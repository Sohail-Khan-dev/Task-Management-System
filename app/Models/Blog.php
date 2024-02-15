<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable =[
        'title',
        'slug',
        'description',
        'image',
        'status',
        'created_by',
        'author',
        'category',
        'tags',
        'published_at'
    ];
}
