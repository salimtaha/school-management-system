<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name_class'];
    protected $fillable = ['name_class' , 'grade_id'];
    protected $table = 'Classrooms';
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo(new Grade());
    }
}
