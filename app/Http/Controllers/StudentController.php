<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::oldest()->paginate(10);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::select('teacher_id','teacher_name')->get();
        return view('students.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'age' => 'required|numeric|min:3|max:50',
            'gender' => 'required',
            'teachers_id' => 'required'
            ]);
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->teacher_id = $request->teachers_id;
        $student->save();
        return redirect()->route('students.index')
            ->with('success','Student details has been sucessfully created.');
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
        $student = Student::find(decrypt($id));
        $teachers = Teacher::select('teacher_id','teacher_name')->get();
        return view('students.edit',compact('teachers','student'));
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



        $request->validate([
            'student_name' => 'required',
            'age' => 'required|numeric|min:3|max:50',
            'gender' => 'required',
            'teachers_id' => 'required'
            ]);
        //return $request;
        $update_student = Student::find(decrypt($id));
        $update_student->update(
            [
                'student_name' =>$request->student_name,
                'age' =>$request->age,
                'gender' =>$request->gender,
                'teacher_id' =>$request->teachers_id,
            ]
            );
        return redirect()->route('students.index')
            ->with('success','Student details has been sucessfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find(decrypt($id))->delete();
        return redirect()->route('students.index')
        ->with('success','Student details has been successfully deleted.');

    }
}
