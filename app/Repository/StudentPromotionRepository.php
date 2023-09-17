<?php 
namespace App\Repository;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface{

    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.promotion.index' , compact('Grades'));
    }
    public function store($request)
    {
        DB::beginTransaction(); 
        try{
            $student_ids = Student::where('Grade_id' , $request->Grade_id)->where('Classroom_id' , $request->Classroom_id)->where('section_id' , $request->section_id)->where('academic_year' , $request->old_academic_year)->pluck('id');
            if($student_ids->count()<1)
            {
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }
            foreach($student_ids as $id)
            {
                Student::where('id' , $id)->update([
                    'Grade_id'=>$request->Grade_id_new,
                    'Classroom_id'=>$request->Classroom_id_new,
                    'section_id'=>$request->section_id_new,
                    'academic_year'=>$request->new_academic_year,
                ]);

                // insert into promotion table 
                Promotion::updateOrCreate([
                    'student_id'=>$id,
                    'from_grade'=>$request->Grade_id,
                    'from_classroom'=>$request->Classroom_id,
                    'from_section'=>$request->section_id,     
                    'to_grade'=>$request->Grade_id_new,
                    'to_classroom'=>$request->Classroom_id_new,
                    'to_section'=>$request->section_id_new,  
                    'old_academic_year'=>$request->old_academic_year,
                    'new_academic_year' =>$request->new_academic_year,    
                ]);
            }
            DB::commit();
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
     
    }
    public function mangement_promotion()
    {
        $promotions = Promotion::select('id' , 'student_id' , 'from_grade' , 'from_Classroom' , 'from_section' , 'to_grade' , 'to_classroom' , 'to_section' , 'old_academic_year' , 'new_academic_year')->get();

        return view('pages.Students.promotion.management' , compact('promotions'));
    }
    public function unDoUpgrade($request , $id,$student_id)
    {
        try
        {
           if($request->page_id==1)
           {
             // retrive about promotion 
             $promotions = Promotion::all();
             foreach($promotions as $promotion)
             {
                // retrive student`s promotion
                $id = explode(',' , $promotion->student_id);
                Student::whereIn('id' , $id)->update([
                    'Grade_id'=>      $promotion->from_grade,
                    'Classroom_id'=>  $promotion->from_Classroom,
                    'section_id'=>    $promotion->from_section,
                    'academic_year'=> $promotion->old_academic_year,     
                ]);
             }
            //  ------------------another way----------------------- 
            // foreach($promotions as $promotion)
            // {
            //    // retrive student`s promotion
            //    Student::where('id' , $promotion->student_id)->update([
            //        'Grade_id'=>      $promotion->from_grade,
            //        'Classroom_id'=>  $promotion->from_Classroom,
            //        'section_id'=>    $promotion->from_section,
            //        'academic_year'=> $promotion->old_academic_year,     
            //    ]);
            // }

            //  truncate promotions table 
             Promotion::truncate();
             
           }
            elseif($request->page_id==2){

            // $student_promotion = Promotion::where('id' , $id)->first();
            // $student = Student::where('id' , $student_id)->first();
            // $student->Grade_id = $student_promotion->from_grade;
            // $student->Classroom_id= $student_promotion->from_Classroom;
            // $student->section_id=$student_promotion->from_section;
            // $student->academic_year=$student_promotion->old_academic_year;
            // $student->save();
            // DB::table('promotions')->where('id' , $id)->delete();
            
            // --------------- again code ------------------
            $Promotion = Promotion::findorfail($request->id);
            student::where('id', $Promotion->student_id)
                ->update([
                    'Grade_id'=>$Promotion->from_grade,
                    'Classroom_id'=>$Promotion->from_Classroom,
                    'section_id'=> $Promotion->from_section,
                    'academic_year'=>$Promotion->old_academic_year,
                ]);


            Promotion::destroy($request->id);
           }

        return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' , $e->getMessage()]);
        }
    }


} 