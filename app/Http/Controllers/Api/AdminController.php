<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Models
use App\Models\Admins;
use App\Helpers\Helper;

class AdminController extends Controller
{
    // ===============================================   Create   ====================================================================
    public function create_admin(Request $request){
        $data = new Admins();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->admin_Id = Helper::Generator(new Admins,'admin_Id',4,'Admin');

        $data->save();
         return response()->json([
            'status' => true,
            'massage' => 'Admin was created successfully'
         ]);
    }
    // ===============================================   Read   =======================================================================
    public function get_admin(Request $request){
        $data = Admins::where('id',$request->id)->first() ?? Admins::all();

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

}
