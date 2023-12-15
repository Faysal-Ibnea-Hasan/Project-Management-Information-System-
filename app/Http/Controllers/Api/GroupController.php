<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;

// Import Models
use App\Models\Groups;

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
        $data->member_1 = $request->member_1 ?? '';
        $data->member_2 = $request->member_2 ?? '';
        $data->member_3 = $request->member_3 ?? '';

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Group was created successfully'
         ]);
    }
    // ===============================================   Read   =======================================================================
    public function get_group(Request $request){
        $data = Groups::where('id',$request->id)->first() ?? Groups::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    // ===============================================   Update   ====================================================================
    public function update_group(Request $request){
        $data = Groups::where('id',$request->id)->first();

        $data->name = $request->name ?? $data->name;
        $data->member_1 = $request->member_1 ?? $data->member_1;
        $data->member_2 = $request->member_2 ?? $data->member_2;
        $data->member_3 = $request->member_3 ?? $data->member_3;

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
