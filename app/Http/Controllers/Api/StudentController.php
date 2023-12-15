<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// Import Models
use App\Models\Students;


class StudentController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_student(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'student_Id' => 'required',
            'password' => 'required',
        ]);
        $data = new Students();

        $data->name = $request->name ?? '';
        $data->email = $request->email ?? '';
        $data->student_Id = $request->student_Id ?? '';
        $data->batch = $request->batch ?? '';
        $data->department = $request->department ?? '';
        $data->about = $request->about ?? '';
        $data->password = $request->password ?? '';
        if($request->image){
            $file = $request->file('image');
            $image = Storage::disk('public')->putFileAs('student',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($image);
            $data->image = $url;
        }
        else{
            $data->image = '';
        }



        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Student was created successfully'
         ]);
    }
    // ===============================================   Read   =======================================================================
    public function get_student(Request $request){
        $data = Students::where('id',$request->id)->first() ?? Students::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_student(Request $request){
        $data = Students::where('id',$request->id)->first();

        $data->name = $request->name ?? $data->name;
        $data->email = $request->email ?? $data->email;
        $data->student_Id = $request->student_Id ?? $data->student_Id;
        $data->batch = $request->batch ?? $data->batch;
        $data->department = $request->department ?? $data->department;
        $data->about = $request->about ?? $data->about;
        $data->password = $request->password ?? $data->password;
        if($request->image){
            $file = $request->file('image');
            $image = Storage::disk('public')->putFileAs('student',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($image);
            $data->image = $url ?? $data->image;
        }



        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Student was updated successfully'
         ]);
    }
     // ===============================================   Delete   =======================================================================
     public function delete_student(Request $request){
        $data = Students::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Student was deleted successfully'
        ]);
    }
}
