<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostWomen extends Model
{
    use HasFactory;
    protected $with = ['women_category'];

    public function women_category()
    {
        return $this->belongsTo(WomenCategory::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('women_category', fn ($query) =>
        $query->where('name', $category)));
    }
}

