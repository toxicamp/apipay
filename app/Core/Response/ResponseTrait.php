<?php


namespace App\Core\Response;


use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function errorResponse(array $errors, int $httpCode = Response::HTTP_OK, $addedParams = [])
    {
        $data = ['errors' => $errors];

        if(count($addedParams)){
            $data = $addedParams + $data;
        }

        $data = [
            'success'        => false,
            'data'           => $data,

        ];

        return response()->json($data, $httpCode, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function successResponse(array $data, int $httpCode = Response::HTTP_OK)
    {
        $data = [
            'success'        => true,
            'data'           => $data,

        ];

        return response()->json($data, $httpCode, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        JSON_UNESCAPED_UNICODE);
    }
}
