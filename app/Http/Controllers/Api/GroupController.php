<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;

// Import Models
use App\Models\Groups;
use App\Models\Students;

class GroupController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_group(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $data = new Groups();

        $data->name = $request->name ?? '';
        $data->group_Id = Helper::Generator(new Groups,'group_Id',4,'Group');

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Group was created successfully',
            "group_Id" => $data->group_Id
         ]);
    }
    // ===============================================   Read   =======================================================================
    public function get_group(Request $request){
        $data = Groups::where('group_Id',$request->group_Id)->first() ?? Groups::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_group(Request $request){
        $data = Groups::where('id',$request->id)->first();

        $data->name = $request->name ?? $data->name;

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Group was updated successfully'
         ]);
    }
     // ===============================================   Delete   =======================================================================
     public function delete_group(Request $request){
        $data = Groups::where('id',$request->id)->first();
        $data->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Group was deleted successfully'
        ]);
    }
}
