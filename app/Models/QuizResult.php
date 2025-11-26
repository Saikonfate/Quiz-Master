<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = ['user_id', 'score', 'correct_count', 'error_count', 'total_time_seconds'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
