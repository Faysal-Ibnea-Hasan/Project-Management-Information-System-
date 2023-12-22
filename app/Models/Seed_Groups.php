<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Students;
use App\Models\Groups;

class Seed_Groups extends Model
{
    use HasFactory;
    protected $table = 'tbl_seed_groups';


    public function Groups(){
        return $this->belongsTo(Groups::class,'group_Id','group_Id');
    }
    public function Students(){
        return $this->belongsTo(Students::class,'student_Id','student_Id');
    }
}
