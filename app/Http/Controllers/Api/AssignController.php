<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Models
use App\Models\Assigns;
class AssignController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_assign(Request $request)
    {
        $data = new Assigns();

        $data->student_Id = $request->student_Id ?? '';
        $data->project_Id = $request->project_Id ?? '';
        $data->supervisor_Id = $request->supervisor_Id ?? '';
        $data->group_Id = $request->group_Id ?? '';

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Assign was created successfully'
         ]);
    }



    // ===============================================   Read   =======================================================================
    public function get_assign(Request $request){
        $data = Assigns::where('id',$request->id)->first() ?? Assigns::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_assign(Request $request){
        $data = Assigns::where('id',$request->id)->first();

        $data->student_Id = $request->student_Id ?? $data->student_Id ;
        $data->project_Id = $request->project_Id ?? $data->project_Id;
        $data->supervisor_Id = $request->supervisor_Id ?? $data->supervisor_Id;
        $data->group_Id = $request->group_Id ?? $data->group_Id;
        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Assign was updated successfully'
         ]);
    }



     // ===============================================   Delete   =======================================================================
     public function delete_assign(Request $request){
        $data = Assigns::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Assign was deleted successfully'
        ]);
    }
}
