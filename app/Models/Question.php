<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasFactory;
    protected $table ='questions';
    protected $fillable = ['title' , 'answers' ,'right_answer' , 'score' , 'quizz_id'];

    public function quizz()
    {
        return $this->belongsTo(Quizze::class , 'quizz_id');
    }
}
