<?php
namespace App\Traits;


trait GenralTraits
{

    public function returnError($status="", $msg='',$key=null ,$value=null){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            $key => $value
            
        ]);
    }
    public function returnSuccess($status="200", $msg='', $key = null, $data= null){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            $key => $data
        ]);
    }
    public function returnData($status="200", $msg='',$key=null ,$value=null){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'data' => $value
        ]);
    }
    protected function createNewToken($token, $status=201, $msg=''){
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
