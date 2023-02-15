<?php

namespace App\Http\Controllers;

use App\Models\Examinee;
use Illuminate\Http\Request;

class ExamineeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "users_id" => "required",
            "exam_uuid" => "required"
        ]);

        $exminee = Examinee::create([
            "users_id" => $request->users_id,
            "exam_uuid" => $request->exam_uuid,
            "already_done" => "no"
        ]);

        return redirect()->back()->with('success', 'Success add Participant.');
    }
}
