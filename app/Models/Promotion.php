<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id');
    }
    public function oldGrade()
    {
        return $this->belongsTo(Grade::class , 'from_grade');
    }public function newGrade()
    {
        return $this->belongsTo(Grade::class , 'to_grade');
    }
   
    public function oldClassroom()
    {
        return $this->belongsTo(Classroom::class , 'from_Classroom');
    }
    public function newClassroom()
    {
        return $this->belongsTo(Classroom::class , 'to_classroom');
    }
    public function oldSection()
    {
        return $this->belongsTo(Section::class , 'from_section');
    }
    public function newSection()
    {
        return $this->belongsTo(Section::class , 'to_section');
    }
}
