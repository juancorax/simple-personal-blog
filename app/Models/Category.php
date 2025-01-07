<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the articles that belong to the category.
     *
     * @return HasMany<Article,Category>
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
