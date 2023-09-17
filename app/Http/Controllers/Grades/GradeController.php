<?php

namespace App\Http\Controllers\Grades;


use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradesRequest;
use App\Models\Classroom;
use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Validation\Rules\Exists;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!isset($successMessage)){
            $successMessage = '';
        }

        $grades = Grade::all();
        return view('pages.Grades.grades' , compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradesRequest $request)
    {

        
        if(Grade::where('name->ar' , $request->name_ar)->orWhere('name->en' , $request->name_en)->exists())
        {
            return redirect()->back()->withErrors(trans('Grades-trans.exists'));
        }
        
        try{

            $validated = $request->validated();

            $grade = new Grade();
            $grade ->setTranslation('name', 'en', $request->name_en)->setTranslation('name', 'ar', $request->name_ar);
            // $grade->name = ['en'=>$request->name_en , 'ar'=>$request->name->ar];
            $grade ->notes = $request->notes;  
            $grade->save(); 
            return redirect()->route('Grades.index');
        }catch(\Exception $e){

            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);

        }

     

    }
 
       
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        //
        try{
           

            $grade = Grade::findOrFail($id);
            $grade->setTranslation('name', 'en',$request->name_en)->setTranslation('name', 'ar', $request->name_ar);
            $grade->notes = $request->notes;
            $grade->save();
            return redirect()->route('Grades.index');

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $calssrooms_grades_ids = Classroom::where('grade_id' , $id)->pluck('grade_id');

        if($calssrooms_grades_ids->count() == 0 ){

            Grade::findOrFail($id)->delete();
            return redirect()->back();

        }else{
            return redirect()->back()->withErrors('this grade related with classrooms ');
        }

    }
}
