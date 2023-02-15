<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Question extends Model
{
    use HasUuids;
    
    protected $table = "question";
    protected $fillable = [
        "uuid",
        "exam_uuid",
        "question"
    ];

    protected $primaryKey = "uuid";

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers()
    {
        return $this->hasMany(Answers::class);
    }
}
