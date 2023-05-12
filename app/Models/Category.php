<?php

namespace App\Models;

use App\Enums\CategoryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['categories'];

    const News_And_Development = 1;

    const Music_And_Lifestyle = 2;

    const Fashion = 3;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
