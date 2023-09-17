<?php

namespace App\Models;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $translatable = ['Name' , 'Address'];
    protected $guarded = [];

    public function sections()
    {
        return $this->belongsToMany(new Section() , 'teacher_section');
    }

    public function gender()
    {

        return $this->belongsTo(new Gender() , 'Gender_id');
    }

   


    public function specialization()
    {
        return $this->belongsTo(new Specialization(), 'Specialization_id');
    }

  
}
