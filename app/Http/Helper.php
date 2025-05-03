<?php

 if(!function_exists('apiResponse')){
    function apiResponse($status , $message , $data = null){
         $response = [
            'status' => $status,
            'message' => $message,
         ];
         $data ? $response['data'] = $data : null;
         return response()->json($response);
    }

 }