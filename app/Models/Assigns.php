<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import Models
use App\Models\Students;
use App\Models\Supervisors;
use App\Models\Groups;
use App\Models\Projects;

class Assigns extends Model
{
    use HasFactory;
    protected $table = 'tbl_assigns';

    public function Students(){
        return $this->belongsTo(Students::class,'student_Id','student_Id');
    }
    public function Supervisors() {
        return $this->belongsTo(Supervisors::class,'supervisor_Id','supervisor_Id');
    }
    public function Groups() {
        return $this->belongsTo(Groups::class,'group_Id','group_Id');
    }
    public function Projects() {
        return $this->belongsTo(Projects::class,'project_Id','project_Id');
    }
}
