<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }
    
    
    public function index()
    {
        return $this->Teacher->getAllTeachers();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Teacher->createTeacher();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Teacher->storeTeacher($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

  
    public function edit(string $id)
    {
        return $this->Teacher->editTeacher($id);
    }

  
    public function update(Request $request)
    {
        return $this->Teacher->updateTeacher($request);
    } 

   
    public function destroy(Request $request)
    {
        //
        return $this->Teacher->deleteTeacher($request);


    }
}
