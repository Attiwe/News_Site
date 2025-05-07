<?php

<<<<<<< HEAD
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
=======
if (!function_exists('apiResponse')) {
   function apiResponse($status, $message, $data = null)
   {
      $response = [
         'status' => $status,
         'message' => $message,
      ];
      $data ? $response['data'] = $data : null;
      return response()->json($response);
   }

   if (!function_exists('filterDataAuthLogin')) {

      function filterDataAuthLogin($request): array
      {
         $data = [
            'email' => ['required', 'email'],
            'password' => ['required', 'string' , 'max:20'],
         ];
         if($request->is('api/register')){
            $data['name'] = ['required', 'string', 'max:255','unique:users,name'];
            $data['username'] = ['required', 'string', 'max:255', 'unique:users,username'];
            $data['image'] = ['nullable', 'image','mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
            $data['country'] = ['nullable', 'string'];
            $data['city'] = ['nullable', 'string'];
            $data['street'] = ['nullable', 'string'];
            $data['phone'] = ['nullable', 'string'];
         }
         return $data;
      }

   }

}
>>>>>>> api
