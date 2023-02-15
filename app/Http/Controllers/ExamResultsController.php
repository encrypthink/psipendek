<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamResultsController extends Controller
{
    public function index()
    {
        $exam = Exam::all();
        return view('results.index', [
            'exam' => $exam
        ]);
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('results.show', ['exam' => $exam]);
    }
}
