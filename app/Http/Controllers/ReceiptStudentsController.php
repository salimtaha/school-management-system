<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FundAccount;
use Illuminate\Http\Request;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('pages.Receipt.index' , compact('receipt_students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
             // حفظ البيانات في جدول سندات القبض
             $receipt_students = new ReceiptStudent();
             $receipt_students->date = date('Y-m-d');
             $receipt_students->student_id = $request->student_id;
             $receipt_students->Debit = $request->Debit;
             $receipt_students->description = $request->description;
             $receipt_students->save(); 
 
             // حفظ البيانات في جدول الصندوق
             $fund_accounts = new FundAccount();
             $fund_accounts->date = date('Y-m-d');
             $fund_accounts->receipt_id = $receipt_students->id;
             $fund_accounts->Debit = $request->Debit;
             $fund_accounts->credit = 0.00;
             $fund_accounts->description = $request->description;
             $fund_accounts->save();
 
             // query to feach student grade and classroom
             $student = Student::findOrFail( $request->student_id); 
             // حفظ البيانات في جدول حساب الطالب
             $student_accounts = new StudentAccount();
             $student_accounts->date = date('Y-m-d');
             $student_accounts->type = 'receipt';
             $student_accounts->receipt_id = $receipt_students->id;
             $student_accounts->student_id = $request->student_id;
             $student_accounts->Grade_id = $student->Grade_id;
             $student_accounts->Classroom_id =$student->Classroom_id;
             $student_accounts->Debit = 0.00;
             $student_accounts->credit = $request->Debit;
             $student_accounts->description = $request->description;
             $student_accounts->save();
 
             DB::commit();
             toastr()->success(trans('messages.success'));
             return redirect()->route('receipt_students.index');

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

           

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Receipt.add' , compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $receipt_student = ReceiptStudent::findOrFail($id);
        return view('pages.Receipt.edit' , compact('receipt_student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try
        {
                        // حفظ البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findOrFail($request->id);
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save(); 

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('receipt_id' , $receipt_students->id)->first();
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // query to feach student grade and classroom
            // حفظ البيانات في جدول حساب الطالب
            $student_accounts = StudentAccount::where('receipt_id' , $receipt_students->id)->first();
            $student_accounts->credit = $request->Debit;
            $student_accounts->description = $request->description;
            $student_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('receipt_students.index'); 
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        ReceiptStudent::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
