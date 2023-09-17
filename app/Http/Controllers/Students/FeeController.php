<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::all();
        return view('pages.Fees.index' , compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Fees.add' , compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fee = new Fee();
        $fee->setTranslation('title' , 'ar' , $request->title_ar)->setTranslation('title' , 'en' , $request->title_en);
        $fee->amount = $request->amount;
        $fee->grade_id = $request->Grade_id;
        $fee->classroom_id = $request->Classroom_id;
        $fee->year = $request->year;
        $fee->fee_type  = $request->fee_type;
        $fee->description = $request->description;
        $fee->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fee = Fee::findOrFail($id);
        $students = Student::where('Grade_id' , $fee->grade_id)->where('Classroom_id' , $fee->classroom_id)->get();
        return view('pages.Fees.studentsPay' , compact('students'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Grades = Grade::all();
        $fee = Fee::findOrFail($id);
        return view('pages.Fees.edit' , compact('fee' , 'Grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fee = Fee::findOrFail($request->id);
        $fee->setTranslation('title' , 'ar' , $request->title_ar)->setTranslation('title' , 'en' , $request->title_en);
        $fee->amount = $request->amount;
        $fee->grade_id = $request->Grade_id;
        $fee->classroom_id = $request->Classroom_id;
        $fee->year = $request->year;
        $fee->fee_type  = $request->fee_type;
        $fee->description = $request->description;
        $fee->save();

        return redirect()->route('Fees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Fee::destroy($request->id);
        return redirect()->back();
    }
}
