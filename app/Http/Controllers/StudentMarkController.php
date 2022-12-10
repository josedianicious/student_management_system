<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Term;
use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_marks = StudentMark::latest()->paginate(10);
        return view('marks.index',compact('student_marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = Term::orderBy('terms.term_id')->get();
        $students = Student::orderBy('students.student_name','ASC')->get();
        return view('marks.create',compact('terms','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'student_name'=>'required',
                'term_id'=>'required',
                'maths_mark'=>'required|numeric|min:0|max:50',
                'science_mark'=>'required|numeric|min:0|max:50',
                'history_mark'=>'required|numeric|min:0|max:50',

            ]
            );
        $total_mark = $request->maths_mark + $request->science_mark + $request->history_mark;
        $student_marks = StudentMark::updateOrCreate(
            [
                'student_id'=>$request->student_name,
                'term_id'=>$request->term_id
            ],
            [
                'maths_mark'=>$request->maths_mark,
                'science_mark'=>$request->science_mark,
                'history_mark'=>$request->history_mark,
                'total_mark'=>$total_mark,
            ]
            );
        return redirect()->route('student-marks.index')->with('success','Student marks are successfully submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terms = Term::orderBy('terms.term_id')->get();
        $students = Student::orderBy('students.student_name','ASC')->get();
        $student_mark = StudentMark::find(decrypt($id));
        return view('marks.edit',compact('terms','students','student_mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'student_name'=>'required',
                'term_id'=>'required',
                'maths_mark'=>'required|numeric|min:0|max:50',
                'science_mark'=>'required|numeric|min:0|max:50',
                'history_mark'=>'required|numeric|min:0|max:50',

            ]
            );
        $total_mark = $request->maths_mark + $request->science_mark + $request->history_mark;
        $student_marks = StudentMark::find(decrypt($id))->update(
            [
                'student_id'=>$request->student_name,
                'term_id'=>$request->term_id,
                'maths_mark'=>$request->maths_mark,
                'science_mark'=>$request->science_mark,
                'history_mark'=>$request->history_mark,
                'total_mark'=>$total_mark,
            ]
            );
        return redirect()->route('student-marks.index')->with('success','Student marks are successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marks_delete = StudentMark::find(decrypt($id))->delete();
        return redirect()->route('student-marks.index')->with('success','Student marks entries are successfully deleted.');
    }
}
