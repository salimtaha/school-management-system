<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;
 
class PromotionController extends Controller
{
    protected $Promotion;
    public function __construct(StudentPromotionRepositoryInterface $Promotion){
        $this->Promotion =$Promotion;
    }
    public function index()
    {
        return $this->Promotion->index();
    }
    public function mangement_promotion()
    {
        return $this->Promotion->mangement_promotion();
    }
    public function unDoUpgrade(Request $request , $id,$student_id)
    {
        return $this->Promotion->unDoUpgrade($request , $id,$student_id);
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        return $this->Promotion->store($request);
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

 
    public function update(Request $request, string $id)
    {
        //
    }

  
    public function destroy(string $id)
    {
        //
    }
}
