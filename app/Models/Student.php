<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;

    // protected $table = 'stud';
    // protected $primaryKey = 'student_id';

    // necessary when you delete the updated_at and inserted_at column from the db structure
    // public $timestamps = false;

    // One to one relationship
    // public function rPhone()
    // {
    //     // return $this->hasOne(Phone::class);
    // }

    public function rPhone()
    {
        return $this->hasMany(Phone::class);
    }
}
