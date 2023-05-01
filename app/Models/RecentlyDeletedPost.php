<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentlyDeletedPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'summary',
        'content',
        'author_id',
        'published_at',
        'category_id',
        'published',
        'featured_image_path'
    ];
}
