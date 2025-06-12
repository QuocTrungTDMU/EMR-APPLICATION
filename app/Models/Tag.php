<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color',
        'description',
        'posts_count'
    ];

    // Relationships
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    // Update posts count
    public function updatePostsCount()
    {
        $this->posts_count = $this->posts()->published()->count();
        $this->save();
    }
}
