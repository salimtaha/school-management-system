<?php 
namespace App\Repository;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Bloodtype;
use App\Models\Classroom;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\StudentAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{

  
    public function getAllStudent()
    {
        $students = Student::all();
        return view('pages.Students.index' , compact('students'));

    }

    public function createStudent()
    {
       $data = []; 
       $data['grades'] = Grade::all(); 
       $data['parents'] = My_Parent::all();
       $data['Genders'] = Gender::all();
       $data['nationals'] = Nationalitie::all();
       $data['bloods'] = Bloodtype::all();
       
        return view('pages.Students.add' , $data );
    }
    public function Get_classrooms($id)
    {
        return Classroom::where('grade_id' , $id)->pluck('name_class','id');
        
    }
    public function Get_Sections($id)
    {
        return Section::where('class_id' , $id)->pluck('name_section' , 'id');
    }
    public function storeStudent($request)
    {
        
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'student_attachment');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.create');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function editStudent($id)
    {
        $data = []; 
        $data['Grades'] = Grade::all(); 
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Bloodtype::all();

        $Students = Student::findOrFail($id);

        return  view('pages.Students.edit' , $data , compact('Students'));

    }
    public function updateStudent($request)
    {
 
        $student = Student::findOrFail($request->id);
        $student->setTranslation('name' , 'ar' , $request->name_ar)->setTranslation('name' , 'en' , $request->name_en);
        $student->email = $request->email;

        if ( $request->password == $student->password)
        {
           $student->password = $request->password;
        }else{
            if(strlen($request->password)>10){
                return redirect()->back()->withErrors(['error'=>trans('validation.password_max')]);
            }else{
                $student->password =Hash::make($request->password);
            }
        }

        $student->gender_id = $request->gender_id;
        $student->nationalitie_id = $request->nationalitie_id;
        $student->blood_id = $request->blood_id;
        $student->Date_Birth = $request->Date_Birth;
        $student->Grade_id = $request->Grade_id;
        $student->Classroom_id = $request->Classroom_id;
        $student->section_id = $request->section_id;
        $student->parent_id = $request->parent_id;
        $student->academic_year = $request->academic_year;
        $student->save();

        return redirect()->route('Students.index');
    }
    // Student Show 
    public function showStudent($id)
    {
        $Student = Student::findOrFail($id);
        return view('pages.Students.show' , compact('Student'));
    }
    public function StoreStudentAttachments($request)
    {
        foreach($request->file('photos') as $photo)
        {
        $name = $photo->getClientOriginalName();

        // store in db
        $image = new Image();
        $image->fileName = $name;
        $image->imageable_id = $request->student_id;
        $image->imageable_type = 'App\Models\Student';
        $image->save();
        // store in public 
        $photo->storeAs('attachments/students/'.$request->student_name , $name ,'student_attachment');
        }
        return redirect()->back();
        
    }
    public function download_studnet_attachment($name ,$fileName)
    {
        // $name = 'attachments/students/'.$name.'/'.$fileName;
        return response()->download(public_path('attachments/students/'.$name.'/'.$fileName));
    }

    public function deleteStudentImage($request)
    {
        // delete image from public 
        Storage::disk('student_attachment')->delete('attachments/students/'.$request->student_name.'/'.$request->image_name);
        // delete from db 
        Image::findOrFail($request->image_id)->delete();
        return redirect()->back();
    }
    public function show_student_attachment($name , $fileName)
    {
        $path = public_path('attachments/students/'.$name.'/'.$fileName);
        // $file = file_get_contents($path);
        // $type = mime_content_type($path);
        // $name =$name;
        
        // return  "<image src='$path' style='width:70px;' controal>";
    }
    public function deleteStudent($request)
    {
        Student::destroy($request->id);
        return redirect()->back();
        
    }


}