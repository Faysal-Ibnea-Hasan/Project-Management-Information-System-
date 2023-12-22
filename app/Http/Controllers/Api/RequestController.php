<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Requests;
use App\Models\Students;

class RequestController extends Controller
{
    public function send_request(Request $request){
        $reciever_Id = Students::where('student_Id',$request->reciever_Id)->first();
        if($reciever_Id){
            $data = new Requests();

            $data->sender_Id = $request->sender_Id ?? "";
            $data->group_Id = $request->group_Id ?? "";
            $data->reciever_Id = $request->reciever_Id ?? "";
            $data->status = $request->status ?? 0;

            $data->save();
            return response()->json([
                'status' => true,
                'massage' => 'Request was sent successfully'
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'massage' => 'No student was found with the reletive ID'
            ]);
        }


    }
    public function get_request(Request $request){
        $data = Requests::where('reciever_Id', $request->reciever_Id)->with('Groups')->with('Students')->get();
        if($data){

            return response()->json([
                "status" => true,
                "massage" => "Request has been found",
                "data" => $data
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "massage" => "Request hasn't been found",

            ]);
        }
    }
    public function accept_request(Request $request){
        $data = Requests::where('reciever_Id', $request->reciever_Id)->first();
        if($data){
            $data->status = $request->status;
            $data->save();
            return response()->json([
                "status" => true,
                "massage" => 'Status was updated successfully'
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "massage" => 'No request found'
            ]);
        }
    }
    public function reject_request(Request $request){
        $data = Requests::where('id', $request->id)->first();
        if($data){
            $data->delete();

            return response()->json([
                "status" => true,
                "massage" => "Request rejected"
            ]);
        }
        else{
            return response()->json([
                "status" => false,
                "massage" => "Rejection failed"
            ]);
        }
    }


}
