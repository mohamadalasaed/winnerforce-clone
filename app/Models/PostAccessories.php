<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAccessories extends Model
{
    use HasFactory;
    protected $with = ['accessories_category'];

    public function accessories_category()
    {
        return $this->belongsTo(AccessoriesCategory::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')));

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('accessories_category', fn ($query) =>
        $query->where('name', $category)));
    }
}
