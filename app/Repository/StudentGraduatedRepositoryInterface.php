<?php 
namespace App\Repository;

interface StudentGraduatedRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function restore($request);
    public function destroy($request);

     
}