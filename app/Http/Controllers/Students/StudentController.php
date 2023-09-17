<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
       $this->Student = $Student;
    }
    
    public function index()
    {
        return $this->Student->getAllStudent();
    }


    public function create()
    {
        return $this->Student->createStudent();
    }

  
    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }
    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }
    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->storeStudent($request);
    }

    public function show(string $id)
    {
        return $this->Student->showStudent($id);
          
    }

 
    public function edit(string $id)
    {
        return $this->Student->editStudent($id);
    }


    public function update(StoreStudentsRequest $request)
    {
        //
        return $this->Student->updateStudent($request);
    }

    public function StoreStudentAttachments(Request $request)
    {
        return $this->Student->StoreStudentAttachments($request);
    }
    public function download_studnet_attachment($name ,$fileName)
    {
        return $this->Student->download_studnet_attachment($name , $fileName);
    }
    public function show_student_attachment($name , $fileName)
    {
        return $this->Student->show_student_attachment($name , $fileName);
    }
    public function deleteStudentImage(Request $request)
    {
        return $this->Student->deleteStudentImage($request);
    }

    public function destroy(Request $request)
    {
        return $this->Student->deleteStudent($request);

    }

}
