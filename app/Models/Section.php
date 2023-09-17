<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name_section' , 'status' , 'grade_id' , 'class_id'];
    protected $table ='sections';
    public $translatable = ['name_section'];

    public function my_classes()
    {
        return $this->belongsTo(new Classroom() , 'class_id');
    }
    public function teachers()
    {
        return $this->belongsToMany(new Teacher() , 'teacher_section');
    }
    
}
