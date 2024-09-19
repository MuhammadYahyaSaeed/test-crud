<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\marks;

class MarksController extends Controller
{
    public function index()
    {
        $marks = DB::table('marks')->get();
        return view('marks', compact('marks'));
    }

    public function add()
    {
        return view('add_marks');
    }

    public function addMarks(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'marks' => 'required|numeric|between:0,100',
            'remarks' => 'required',
        ]);
        $student_name = $request->input('name');
        $subject = $request->input('subject');
        $student_marks = $request->input('marks');
        $remarks = $request->input('remarks');
        // Mass assigning
        marks::create([
            'name' => $student_name,
            'subject' => $subject,
            'marks' => $student_marks,
            'remarks' => $remarks,
        ]);
        return redirect('marks')->with('success_message', 'Marks has been added successfully.');
    }

    public function edit(marks $marks)
    {
        return view('edit_marks', compact('marks'));
    }

    public function editMarks(marks $marks, Request $request)
    {
        $student_name = $request->input('student_name');
        $subject = $request->input('subject');
        $student_marks = $request->input('marks');
        $remakrs = $request->input('remakrs');

        $marks->name = $student_name;
        $marks->subject = $subject;
        $marks->marks = $student_marks;
        $marks->remarks = $remakrs;
        $marks->save();
        return redirect('marks')->with('success_message', 'Marks has been updated successfully.');
    }

    public function deleteMarks($id, Request $request)
    {
        // Find the particular record/model to delete
        $marks = marks::findorFail($id);
        $marks->delete();
        return redirect('marks')->with('success_message', 'Record has been deleted successfully.');
    }
}
