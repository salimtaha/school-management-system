<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();
    public function createTeacher();
    public function storeTeacher($request);
    public function editTeacher($id);
    public function updateTeacher($request);
    public function deleteTeacher($request);
    

} 