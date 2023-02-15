<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Exam extends Model
{
    use HasUuids;

    protected $table = "exam";
    protected $fillable = [
        "uuid",
        "exam_name",
        "available",
    ];
    protected $primaryKey = "uuid";

    public function examinee()
    {
        return $this->hasMany(Examinee::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(UsersAnswers::class);
    }
}
