<?php 
namespace App\Repository;
interface StudentRepositoryInterface{
    public function getAllStudent();
    public function createStudent();
    public function Get_classrooms($id);
    public function Get_Sections($id); 
    public function storeStudent($request);
    public function editStudent($id);
    public function updateStudent($request);
    public function showStudent($id);
    public function StoreStudentAttachments($request);
    public function download_studnet_attachment($name ,$fileName);
    public function show_student_attachment($name,$fileName);
    public function deleteStudent($request);
    public function deleteStudentImage($request);

}