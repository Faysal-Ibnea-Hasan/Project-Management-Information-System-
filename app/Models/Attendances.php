<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Import Models
use App\Models\Students;

class Attendances extends Model
{
    use HasFactory;
    protected $table = 'tbl_attendances';

    public function Students(){
        return $this->belongTo(Student::class,'student_Id','student_Id');
    }
}
