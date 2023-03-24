<?php
namespace Devsfort\ChatGpt\Managers;

use Illuminate\Support\Facades\Response;

class BaseManager 
{
    public static function errorResponse($message = "Something Went Wrong")
    {
        $response = [
            'status' => false,
            'message' => $message
        ];
        return Response::json($response, 400);
    }

    public static function successResponse($message,$data)
    {
        $response = [
            'status'  => true,
            'message' => $message || 'Success',
            'data'    => $data
        ];
        
        return Response::json($response, 200);
    }


    public function getIpAddress()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
    
        return explode(',',$ipaddress)[0];
    }

}
