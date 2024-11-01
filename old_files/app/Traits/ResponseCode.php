<?php


namespace App\Traits;


use App\Traits\ResponseCodeTrait;
use App\Utilities\GeneralConstants;
use Illuminate\Http\JsonResponse;

trait ResponseCode
{
    use ResponseCodeTrait;

    public function sendSuccess($data, $resp_description = "Request was successful"): JsonResponse
    {
        return response()->json([
            "resp_code" => GeneralConstants::SUCCESS_CODE,
            "resp_message" => GeneralConstants::SUCCESS_RESP_MESSAGE,
            "resp_description" => $resp_description,
            "data" => $data,
            "errors" => null
        ], self::$STATUS_CODE_DONE);
    }

    public function errorResponse($error, $resp_message, $resp_code = "01", $resp_description = ""): JsonResponse
    {
        if ($resp_description == "") {
            $resp_description = $resp_message;
        }
        return response()->json([
            "resp_code" => $resp_code,
            "resp_message" => $resp_message,
            "resp_description" => $resp_description,
            "data" => null,
            "errors" => $error
        ], self::$STATUS_CODE_NOT_VALID);
    }

    public function customError($error, $resp_message, $resp_code, $resp_description = null): array
    {
        return [
            "resp_code" => $resp_code,
            "resp_message" => $resp_message,
            "resp_description" => $resp_description,
            "data" => null,
            "errors" => $error
        ];
    }

}
