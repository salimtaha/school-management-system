<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
use App\Models\Teacher;

class SectionController extends Controller
{
    public function index()
    {
  
      $Grades = Grade::with(['Sections'])->get();
  
      $list_Grades = Grade::all();
      $teachers = Teacher::all();
      return view('pages.Sections.Sections',compact('Grades','list_Grades' , 'teachers'));
  
    }
  
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreSections $request)
    {
  
      try {
  
        $validated = $request->validated();
        $section = new Section();
        $section->setTranslation('name_section' , 'ar' , $request->Name_Section_Ar)->setTranslation('name_section' , 'en' , $request->Name_Section_En);
        $section->grade_id = $request->Grade_id;
        $section->class_id = $request->Class_id;
        $section->status = 1;
        $section->save();
        $section->teachers()->attach($request->teacher_id);

        return redirect()->route('Sections.index');
    }
  
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  
    }
  
  
   
    public function update(StoreSections $request)
    {
  
      try {
        $validated = $request->validated();
        $Sections = Section::findOrFail($request->id);
  
        $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
  
        if(isset($request->Status)) {
          $Sections->Status = 1;
        } else {
          $Sections->Status = 2;
        }


         // update pivot tABLE
         if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
             $Sections->teachers()->sync(array());
        }
  

        $Sections->save();
        return redirect()->route('Sections.index');
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  
    }
  
 
    public function destroy(request $request)
    {
  
      Section::findOrFail($request->id)->delete();
      return redirect()->route('Sections.index');
  
    }
  
 

    public function getclasses($id)
    {
        $list_classes  = Classroom::where('grade_id' , $id)->pluck('name_class' , 'id');
        return $list_classes;
    }
}
