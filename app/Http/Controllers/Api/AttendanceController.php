<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Models
use App\Models\Attendances;

class AttendanceController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_attendance(Request $request)
    {
        $request->validate([
            'student_Id' => 'required',
            'date' => 'required',
        ]);
        $data = new Attendances();

        $data->student_Id = $request->student_Id ?? '';
        $data->date = $request->date ?? '';
        $data->present = $request->present ?? '';

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Attendance was created successfully'
         ]);
    }



    // ===============================================   Read   =======================================================================
    public function get_attendance(Request $request){
        $data = Attendances::where('id',$request->id)->first() ?? Attendances::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_attendance(Request $request){
        $data = Attendances::where('id',$request->id)->first();

        $data->student_Id = $request->student_Id ?? $data->student_Id;
        $data->date = $request->date ?? $data->date;
        $data->present = $request->present ?? $data->present;
        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Attendance was updated successfully'
         ]);
    }



     // ===============================================   Delete   =======================================================================
     public function delete_attendance(Request $request){
        $data = Attendances::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Attendance was deleted successfully'
        ]);
    }
}
