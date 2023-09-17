<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;
    protected $fillable = ['type','fee_invoice_id','student_id' . 'Grade_id' , 'Classroom_id' , 'Debit' , 'credit' , 'description'];
}
