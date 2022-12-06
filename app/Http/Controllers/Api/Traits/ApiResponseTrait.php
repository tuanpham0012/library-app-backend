<?php

namespace App\Http\Controllers\Api\Traits;

trait ApiResponseTrait
{
    protected function responseCollection($data){
        return $data;
    }

    protected function responseOne($data, $code = 200){
        $data = [
            'code' => $code,
            'success' => true,
            'data' => $data
        ];
        return response()->json($data, 200);
    }
}
