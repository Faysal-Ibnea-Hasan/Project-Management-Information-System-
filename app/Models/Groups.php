<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Import Models
use App\Models\Students;

class Groups extends Model
{
    use HasFactory;
    protected $table = 'tbl_groups';

    public function Students(){
        return $this->belongTo(Students::class,['member_1','member_2','member_3'],'student_Id');
    }
}
