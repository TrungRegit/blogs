<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'content',
        'link_image',
        'user_id',
        'category_id',
        'status',
        'created_at',
    ];

    public function commemts(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
