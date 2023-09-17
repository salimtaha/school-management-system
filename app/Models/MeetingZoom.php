<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingZoom extends Model
{
    use HasFactory;
    protected $table = 'meeting_zooms';
    protected $guarded = [];

    public function grade()
    {
        return $this->belongsTo(Grade::class , 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class , 'classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }
}
