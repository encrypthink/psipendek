<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Examinee;
use App\Models\Question;
use App\Models\UsersAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $examinee = Examinee::where('users_id', Auth::user()->id)->get();
        return view('dashboard', ['examinee' => $examinee]);
    }

    public function sheet($id)
    {
        $answer = UsersAnswers::where('exam_uuid', $id)->where('users_id', Auth::user()->id);
        $question = Question::where('exam_uuid', $id);

        if ($answer->count() == $question->count()) {
            return view('finish', [
                'question' => $question->count(),
                'answer' => $answer->where('value', 'correct')->count()
            ]);
        } else {
            $answer = $answer->select('question_uuid')->get();
            return view('question', ['question' => $question->whereNotIn('uuid', $answer)->first(), 'answer' => count($answer)]);
        }
    }

    public function submitAnswer(Request $request, $id)
    {
        $request->validate([
            'question_uuid' => 'required',
            'answer' => 'required',
        ]);

        $answer = Answers::where('question_uuid', $request->question_uuid)->where('id', $request->answer)->first();

        $answered = UsersAnswers::create([
            'users_id' => Auth::user()->id,
            'exam_uuid' => $id,
            'answer' => $request->answer,
            'value' => ($answer->is_answer == "yes") ? "Correct" : "Wrong",
            'question_uuid' => $request->question_uuid
        ]);

        $wasAnswered = UsersAnswers::where('exam_uuid', $id)->where('users_id', Auth::user()->id)->count();
        $totalQuestion = Question::where('exam_uuid', $id)->count();

        if ($wasAnswered == $totalQuestion) {
            $finish = Examinee::where('exam_uuid', $id)->where('users_id', Auth::user()->id)->first();
            $finish->already_done = "yes";
            $finish->save();
        }

        return redirect()->route('sheet', $id)->with('success', 'Success saved answer.');
    }
}
