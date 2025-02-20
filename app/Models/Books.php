<?php

namespace App\Models;

use App\Models\Purchases;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Books extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchases::class, 'book_id', 'id');
    }
}
