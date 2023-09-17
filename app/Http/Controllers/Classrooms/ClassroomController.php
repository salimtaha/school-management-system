<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
      $My_Classes = Classroom::orderBy('id', 'asc')->get();
      $grades = Grade::select('id' , 'name')->get();
      return view('pages.My_Classes.My_Classes',compact('grades','My_Classes'));

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
    public function store(StoreClassroomRequest $request)
    {
       
        
        // $this->validate($request , [
        //     'List_Classes.*.name_ar'=>'required',
        //     'List_Classes.*.name_en'=>'required',        ],
        // [
 
        //     'name_ar.required'=>trans('validation.required'),
        //     'name_en.requires'=>trans('validation.required'),
        // ]);

        try
        {
            $List_Classes = $request->List_Classes;
            // return $List_Classes;
            foreach($List_Classes as $List_Class){
                $classroom = new Classroom();
                $classroom->setTranslation('name_class', 'en', $List_Class['name_en'])->setTranslation('name_class', 'ar', $List_Class['name_ar']);
                $classroom->grade_id = $List_Class['grade_id'];
                $classroom->save();
            
            }

            return redirect()->back();
        }


        catch(\Exception $e)
        {
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
    public function update(Request $request, string $id)
    {
        
        
        // $classroom = Classroom::findOrFail($id);
        // $classroom->setTranslation('name_class', 'en',$request->name_en)->setTranslation('name_class', 'ar', $request->name_ar);
        // $classroom->grade_id = $request->grade_id;
        // $classroom->save();

        // return redirect()->back();
        
        try{
            $classroom = Classroom::findOrFail($id);
            $classroom->update([
                $classroom->name_class = ['ar'=>$request->name_ar ,  'en'=>$request->name_en],
                $classroom->grade_id = $request->grade_id,
            ]);
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

            
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::findOrFail($id)->delete();
        return redirect()->route('Classrooms.index');
    }

    public function bulkDelete(Request $request)
    {
        $selectedIds = $request->input('selected');
    
        if (!empty($selectedIds)) {
            Classroom::whereIn('id', $selectedIds)->delete();
        }
    
        return redirect()->back();
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }


    public function Filter_Classes(Request $request)
    {
        $grades = Grade::all();
        $My_Classes = Classroom::select('*')->where('Grade_id','=',$request->Grade)->get();
        return view('pages.My_Classes.My_Classes',compact('grades' , 'My_Classes'));

    }
}
