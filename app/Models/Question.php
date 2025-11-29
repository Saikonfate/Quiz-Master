<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['statement', 'category'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
