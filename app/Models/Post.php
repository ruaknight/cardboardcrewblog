<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author', 'tags', 'comments'];

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
//        $query->when($filters['search'] ?? false, function($query, $search) =>
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }
//        );

        if ($filters['category'] ?? false) {
//            $query->whereExists(fn($query) =>
//                $query->from('categories')
//                    ->whereColumn('categories.id', 'posts.category_id')
//                    ->where('categories.name', $filters['category']
//                    )
//            );
            $query->whereHas('category', fn($query)=>
                $query->where('name', $filters['category'])
            );
        }

        if ($filters['author'] ?? false) {
            $query->whereHas('author', fn($query)=>
                $query->where('id', $filters['author'])
            );
        }
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
