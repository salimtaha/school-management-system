<?php 
namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Attendance;

class AttendenceRepository implements AttendenceRepositoryInterface{

    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Attendace.sections' , compact('Grades'));


    }
    public function show($id)
    {
        $students  =  Student::where('section_id' , $id)->get();
        return view('pages.Attendace.index' , compact('students'));

    }
    public function store($request)
    {

        try {

            foreach ($request->attendances as $studentid => $attendance) {

                if( $attendance == 'presence' ) {
                    $attendance_status = true;
                } else if( $attendance == 'absent' ){
                    $attendance_status = false;
                }

                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendance_date'=> date('Y-m-d'),
                    'attendance_status'=> $attendance_status
                ]);

            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    public function update($request)
    {

    }
    public function destroy($request)
    {

    }
}