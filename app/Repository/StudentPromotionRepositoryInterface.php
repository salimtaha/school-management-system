<?php
namespace App\Repository;
interface StudentPromotionRepositoryInterface{
    public function index();
    public function store($request); 
    public function mangement_promotion();
    public function unDoUpgrade($request , $id,$student_id);
}
