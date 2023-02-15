<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
        ]);

        $question = Question::create([
            "exam_uuid" => $request->exam_uuid,
            "question" => $request->question
        ]);

        $answer = Answers::insert([
            [
                "question_uuid" => $question->uuid,
                "answer_text" => $request->option_1,
                "is_answer" => ($request->is_answer == "option_1") ? "yes" : "no"
            ],
            [
                "question_uuid" => $question->uuid,
                "answer_text" => $request->option_2,
                "is_answer" => ($request->is_answer == "option_2") ? "yes" : "no"
            ],
            [
                "question_uuid" => $question->uuid,
                "answer_text" => $request->option_3,
                "is_answer" => ($request->is_answer == "option_3") ? "yes" : "no"
            ],
            [
                "question_uuid" => $question->uuid,
                "answer_text" => $request->option_4,
                "is_answer" => ($request->is_answer == "option_4") ? "yes" : "no"
            ],
        ]);

        return redirect()->back()->with('success', 'Success create Question.');
    }
}
