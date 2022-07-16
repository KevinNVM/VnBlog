<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, $filters = []) {
        // if (isset($filters['search']) ?? false) {
        //     return $query->where('title', 'LIKE', "%".request('search')."%")
        //           ->orWhere('body', 'LIKE', '%'.request('search').'%');
        // }

        $query->when($filters['search'] ?? false, fn($query, $search)
                    =>  $query->where('title', 'LIKE', "%".$search."%")
                    ->orWhere('body', 'LIKE', '%'.$search.'%')
                );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
                    $query->whereHas('category', function($query) use ($category) {
                        $query->where('slug', $category);
                    })
                );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
                $query->whereHas('author', fn($query) => $query->where('UUID', $author)));

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}