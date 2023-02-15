<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersAnswers extends Model
{
    protected $table = "users_answers";
    protected $fillable = [
        "id",
        "users_id",
        "exam_uuid",
        "answer",
        "value",
        "question_uuid"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
