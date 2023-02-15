<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = "answers";
    protected $fillable = [
        "id",
        "question_uuid",
        "answer_text",
        "is_answer"
    ];

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }
}
