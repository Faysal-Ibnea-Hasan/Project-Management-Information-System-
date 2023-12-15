<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Models
use App\Models\Students;
use App\Models\Supervisors;
use App\Models\Admins;

class LoginController extends Controller
{
    public function login_user(Request $request){
        $admin = Admins::where('admin_Id', $request->id)->first();
        $student = Students::where('student_Id', $request->id)->first();
        $supervisor = Supervisors::where('supervisor_Id', $request->id)->first();
        if($admin){
            $data = Admins::where('admin_Id', $request->id)->where('password', $request->password)->first();
            if($data){
                return response()->json([
                    'status' => true,
                    'massage' => 'Admin',
                    'data' => $data
                ]);
            }
            else{
                return response()->json([
                    'status' => true,
                    'massage' => 'Match not found',

                ]);
            }

        }
        else if ($student){
            $data = Students::where('student_Id', $request->id)->where('password', $request->password)->first();
            if($data){
                return response()->json([
                    'status' => true,
                    'massage' => 'Student',
                    'data' => $data
                ]);
            }
            else{
                return response()->json([
                    'status' => true,
                    'massage' => 'Match not found',

                ]);
            }
        }
        else if($supervisor){
            $data = Supervisors::where('supervisor_Id', $request->id)->where('password', $request->password)->first();
            if($data){
                return response()->json([
                    'status' => true,
                    'massage' => 'Supervisor',
                    'data' => $data
                ]);
            }
            else{
                return response()->json([
                    'status' => true,
                    'massage' => 'Match not found',

                ]);
            }
        }
        else{
            return response()->json([
                'status' => false,
                'massage' => 'No user found'
            ]);
        }
    }
}
