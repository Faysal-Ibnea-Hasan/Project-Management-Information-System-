<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Groups;
use App\Models\Students;
use App\Models\Seed_Groups;

class Seed_GroupController extends Controller
{
    public function create_seed_group(Request $request){
        $data = new Seed_Groups();

        $data->group_Id = $request->group_Id;
        $data->student_Id = $request->student_Id;

        $data->save();
         return response()->json([
           "status" => true,
           "massage"=> "Seed created successfully",

        ]);
    }
    public function get_seed_group(Request $request){
        $data = Seed_Groups::where('group_Id',$request->group_Id)->with('Groups')->with('Students')->get();
        if($data){
            return response()->json([
                "status" => true,
                "data" => $data
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "massage" => 'Data not found'
            ]);
        }


    }
    public function get_seed_group_by_student_Id(Request $request){
        $data = Seed_Groups::where('student_Id',$request->student_Id)->first();
        if($data){
            return response()->json([
                "status" => true,
                "data" => $data
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "massage" => 'Data not found'
            ]);
        }


    }
}
