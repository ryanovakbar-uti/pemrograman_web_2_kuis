<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = ['user', 'category'];

    public function scopeFilter($query, array $filters) {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('header', 'like', '%' . $filters['search'] . '%');
        }

        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->whereHas('user', function ($query) use ($user) {
                $query->where('username', $user);
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Change default route key name
    public function getRouteKeyName(): string {
        return 'slug';
    }
}