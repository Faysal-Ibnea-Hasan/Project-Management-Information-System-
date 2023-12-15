<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Import Models
use App\Models\Students;

class Projects extends Model
{
    use HasFactory;
    protected $table = 'tbl_projects';

    public function Students(){
        return $this->hasMany(Students::class,'student_Id','student_Id');
    }
}
