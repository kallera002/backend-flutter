<?php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


/**
 * JSON Response format
 *
 * @package App\Common
 */
class AppResponse
{

    function __construct(
    )
    {
    }

    public function renderResponse(
        $data, 
        $message, 
        $status = Response::HTTP_OK)
    {
        if ($status == 200) {
            $data = [
                'success' => true,
                'message' => $message,
                'data' => $data,
                'status' => $status
            ];
        } else {
            $data = [
                'success' => false,
                'message' => $message,
                'data' => $data,
                'status' => $status,
            ];
        }

        return response()->json($data);
    }
}
