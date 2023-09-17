<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{
 
    public  function getAllTeachers(){
        $Teachers = Teacher::all();
        return view('pages.Teachers.Teachers' , compact('Teachers'));
    }
    public function createTeacher()
    {
        $specializations = Specialization::all();
        $genders = Gender::all();
        return  view('pages.Teachers.create' ,compact('specializations' , 'genders'));
    }
    public function storeTeacher($request)
    {
        try {
            $Teachers = new Teacher();
            $Teachers->Email = $request->Email;
            $Teachers->Password = Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    
    }
    public function editTeacher($id)
    {
        $Teachers = Teacher::findOrFail($id);
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('pages.Teachers.Edit' ,compact('specializations' , 'genders' , 'Teachers'));
    }
    public function updateTeacher($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->Email = $request->Email;
            $Teachers->Password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function deleteTeacher($request)
    {

        Teacher::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}