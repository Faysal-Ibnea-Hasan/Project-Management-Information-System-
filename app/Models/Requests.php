<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Import Models
use App\Models\Students;
use App\Models\Groups;

class Requests extends Model
{
    use HasFactory;
    protected $table = 'tbl_requests';

    public function Students(){
        return $this->belongsTo(Students::class,'sender_Id','student_Id');
    }
    public function Groups(){
        return $this->belongsTo(Groups::class,'group_Id','group_Id');
    }
}
