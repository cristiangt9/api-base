<?php

namespace App\Traits;

trait ApiResponseTrait
{
    
    /**
     * Create a new JSON response.
     *
     * @param  bool  $success
     * @param  int  $code
     * @param  string  $message
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    
    public function defaultResponse($success = true, $code = 00, $message = "", $data = [])
    {
        return response(
            [
                "success" => $success,
                "cod_error" => $code,
                "message_error" => $message,
                "data" => $data,
            ]
        )->header('Content-Type', 'application/json');
    }
    /**
     * Create a new JSON response.
     *
     * @param  bool  $success
     * @param  int  $code
     * @param  string  $message
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function responseNoData($success = true, $message = "", $code = 00)
    {
        return response(
            [
                "success" => $success,
                "cod_error" => $code,
                "message_error" => $message,
            ],
        )->header('Content-Type', 'application/json');
    }

    public function errorResponse($message, $code)
    {
        return response([
            "success" => false,
            "cod_error" => $code,
            "message_error" => $message,
            ]);
    }
}