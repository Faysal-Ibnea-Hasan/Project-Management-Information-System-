<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// Import Models
use App\Models\Supervisors;

class SupervisorController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_supervisor(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'supervisor_Id' => 'required',
            'password' => 'required',
        ]);
        $data = new Supervisors();

        $data->name = $request->name ?? '';
        $data->email = $request->email ?? '';
        $data->supervisor_Id = $request->supervisor_Id ?? '';
        $data->expertise = $request->expertise ?? '';
        $data->department = $request->department ?? '';
        $data->about = $request->about ?? '';
        $data->password = $request->password ?? '';
        if($request->image){
            $file = $request->file('image');
            $image = Storage::disk('public')->putFileAs('supervisor',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($image);
            $data->image = $url ?? '';
        }



        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Supervisor was created successfully'
         ]);
    }
    // ===============================================   Read   =======================================================================
    public function get_supervisor(Request $request){
        $data = Supervisors::where('id',$request->id)->first() ?? Supervisors::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_supervisor(Request $request){
        $data = Supervisors::where('id',$request->id)->first();

        $data->name = $request->name ?? $data->name;
        $data->email = $request->email ?? $data->email;
        $data->supervisor_Id = $request->supervisor_Id ?? $data->supervisor_Id;
        $data->expertise = $request->expertise ?? $data->expertise;
        $data->department = $request->department ?? $data->department;
        $data->about = $request->about ?? $data->about;
        $data->password = $request->password ?? $data->password;
        if($request->image){
            $file = $request->file('image');
            $image = Storage::disk('public')->putFileAs('supervisor',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($image);
            $data->image = $url ?? $data->image ;
        }



        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Supervisor was updated successfully'
         ]);
    }
     // ===============================================   Delete   =======================================================================
     public function delete_supervisor(Request $request){
        $data = Supervisors::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Supervisor was deleted successfully'
        ]);
    }
}
