<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    // one to one relationship
    public function rStudent()
    {
        // return $this->belongsTo(Student::class, 'student_id', 'id');
        // return $this->belongsTo(Student::class, 'student_id');
    }
}
