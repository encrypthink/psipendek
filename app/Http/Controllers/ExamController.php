<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Examinee;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exam = Exam::all();
        return view('exam.index', ['exam' => $exam]);
    }

    public function create()
    {
        return view('exam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'available' => 'required'
        ]);

        $exam = Exam::create([
            "exam_name" => $request->exam_name,
            "available" => $request->available
        ]);

        return redirect()->route('exam.index')->with('success', 'Success create Exam.');
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::where('exam_uuid', $id)->get();
        $users = User::where('role', 'participant')->get();
        $participant = Examinee::where("exam_uuid", $id)->get();
        return view("exam.show", ["exam" => $exam, 'questions' => $questions, 'users' => $users, 'participant' => $participant]);
    }
}
