<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->where('slug', 'like', '%' . $category . '%');
        });
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    // Change default route key name
    public function getRouteKeyName(): string {
        return 'slug';
    }
}