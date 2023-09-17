<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = 'fees';
    protected $translatable = ['title'];
    protected $fillable = ['title' , 'amount' , 'grade_id' , 'classroom' , 'year' , 'description','fee_type'];

     // علاقة بين الرسوم الدراسية والمراحل الدراسية لجب اسم المرحلة

     public function grade()
     {
         return $this->belongsTo(Grade::class, 'grade_id');
     }
 
 
     // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف
 
     public function classroom()
     {
         return $this->belongsTo(Classroom::class, 'classroom_id');
     }
}
