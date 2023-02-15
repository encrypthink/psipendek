<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examinee extends Model
{
    protected $table = "examinee";
    protected $fillable = [
        "id",
        "users_id",
        "exam_uuid",
        "already_done"
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answer()
    {
        return $this->hasMany(UsersAnswers::class);
    }
}
