<?php 
namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface{

    public function  index()
    {
        $students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index' , compact('students'));
    }
    public function create()
     {
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create' ,  compact('Grades'));
     }

     public function store($request)
     {
        // get student to graduate
        $students = Student::where('Grade_id' , $request->Grade_id)->where('Classroom_id' , $request->Classroom_id)->where('section_id' , $request->section_id)->get();
        if($students->count()<1)
        {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }
        foreach($students as $student)
        {
            $student->delete();
        }
        return redirect()->route('Graduated.index');

     }
     public function restore($request)
     {
        Student::withTrashed()->where('id' , $request->id)->restore();
        return redirect()->back();
     }
     public function destroy($request)
     {
        $student = Student::withTrashed()->where('id' , $request->id)->first();
        $student->forceDelete();
        return redirect()->back(); 
     }
}