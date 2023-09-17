<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Nationalitie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasTranslations;
    protected $table = 'students';
    protected $translatable = ['name'];
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(new Gender() , 'gender_id');
    }

    public function grade()
    {
        return $this->belongsTo(new Grade() , 'Grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(new Classroom() , 'Classroom_id');
    }

    public function section()
    {
        return $this->belongsTo(new Section() , 'section_id');
    }

        /**
     * Get all of the student's images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // relation bettwien student and nationality
    public function Nationality()
    {
        return $this->belongsTo(Nationalitie::class , 'nationalitie_id');
    }
    
       // relation bettwien student and Parents
    public function Parent()
    {
        return $this->belongsTo(My_Parent::class , 'parent_id');
    }
    public function student_account()
    {
        return $this->hasMany(StudentAccount::class , 'student_id');
    }   

    public function attendance()
    {
        return $this->hasMany(Attendance::class , 'student_id');
    }


    
} 
