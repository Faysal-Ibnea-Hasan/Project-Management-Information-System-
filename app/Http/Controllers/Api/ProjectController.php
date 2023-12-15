<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;

// Import Models
use App\Models\Projects;

class ProjectController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_project(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Projects();

        $data->name = $request->name ?? '';
        $data->motivation = $request->motivation ?? '';
        $data->project_Id = Helper::Generator(new Projects,'project_Id',4,'Project');
        $data->objective = $request->objective ?? '';
        $data->student_Id = $request->student_Id ?? '';
        $data->file_link = $request->file_link ?? '';

        if($request->file)
        {
            $file = $request->file('file');
            $file_store = Storage::disk('public')->putFileAs('project',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($file_store);
            $data->file = $url ?? '';
        }
        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Project was created successfully'
         ]);
    }



    // ===============================================   Read   =======================================================================
    public function get_project(Request $request){
        $data = Projects::where('id',$request->id)->first() ?? Projects::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_project(Request $request){
        $data = Projects::where('id',$request->id)->first();

        $data->name = $request->name ?? $data->name;
        $data->motivation = $request->motivation ?? $data->motivation;
        $data->objective = $request->objective ?? $data->objective;
        $data->student_Id = $request->student_Id ?? $data->student_Id;
        $data->file_link = $request->file_link ?? $data->file_link;

        if($request->file)
        {
            $file = $request->file('file');
            $file_store = Storage::disk('public')->putFileAs('project',$file,$file->getClientOriginalName());
            $url = Storage::disk('public')->url($file_store);
            $data->file = $url ?? $data->file;
        }
        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Project was updated successfully'
         ]);
    }



     // ===============================================   Delete   =======================================================================
     public function delete_project(Request $request){
        $data = Projects::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Project was deleted successfully'
        ]);
    }
}
