<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasTranslations;
    use HasFactory;

    public $translatable= ['name'];
    protected $fillable = ['name' , 'notes'];
    protected $table = 'grades';

    public function classrooms()
    {
        return $this->hasMany(new Classroom());
    }

    public function sections()
    {
        return $this->hasMany(new Section() , 'grade_id');
    }

  
}
