<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['mencategory'];

    public function mencategory()
    {
        return $this->belongsTo(MenCategory::class);
    }

    // public function scopeFilter($query, array $filters)
    // { //Post::newQuery()->filter()
    //     $query->when($filters['search'] ?? false, fn ($query, $search) =>
    //     $query->where(fn ($query) =>
    //     $query->where('title', 'like', '%' . $search . '%')));

    //     $query->when($filters['category'] ?? false, fn ($query, $category) =>
    //     $query->whereHas('category', fn ($query) =>
    //     $query->where('name', $category)));
    // }
}
