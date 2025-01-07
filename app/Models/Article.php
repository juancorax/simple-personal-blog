<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = ['title', 'full_text', 'category_id'];

    /**
     * Get the user that owns the article.
     *
     * @return BelongsTo<User,Article>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the category that the article belongs to.
     *
     * @return BelongsTo<Category,Article>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
