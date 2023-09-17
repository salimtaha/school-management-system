<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Repository\StudentGraduatedRepositoryInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    protected $Graduated;
    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }
    public function index()
    {
        return $this->Graduated->index();
    }
     public function create()
     {
        return $this->Graduated->create();
     }
     public function store(Request $request)
     {
        return $this->Graduated->store($request);
     }
     public function restore(Request $request)
     {
        return $this->Graduated->restore($request);
     }
     public function destroy(Request $request)
     {
        return $this->Graduated->destroy($request);
     }
}
