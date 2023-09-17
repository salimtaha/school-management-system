<?php 
namespace App\Repository;

interface AttendenceRepositoryInterface{
    public function index();
    public function show($id);
    public function store($requeat);
    public function update($request);
    public function destroy($request);



}