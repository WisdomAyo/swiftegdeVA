<?php

namespace App\Exceptions;

use App\Traits\ResponseCodeTrait;
use App\Utilities\GeneralConstants;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\Exceptions\PostTooLargeException;

class Handler extends ExceptionHandler
{
    use ResponseCodeTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

        $this->renderable(function (TokenInvalidException $e, $request) {
            if ($request->expectsJson()) {
                return $this->errorResponse(
                    "An error occurred",
                    GeneralConstants::ERROR_RESP_MESSAGE,
                    GeneralConstants::ERROR_CODE,
                    "An error occurred",
                    401
                );
            }

            return null;
        });

        $this->renderable(function (Throwable $e, $request) {
            if ($request->expectsJson()) {
                $message = app()->environment('production') ? GeneralConstants::ERROR_RESP_MESSAGE : $e->getMessage();

                return $this->errorResponse(
                    $e->getCode(),
                    $message,
                    GeneralConstants::ERROR_CODE,
                    $message,
                    500
                );
            }

            return null;
        });
    }

    public function errorResponse($error, $resp_message, $resp_code, $resp_description=null,  ?int $httpStatus = 406): JsonResponse
    {

        return response()->json([
            "resp_code" => GeneralConstants::ERROR_CODE,
            "resp_message" => GeneralConstants::ERROR_RESP_MESSAGE,
            "resp_description" => $resp_message,
            "data" => $error,
            "errors" => null
        ], $httpStatus ?? self::$STATUS_CODE_NOT_CREATED);

    }

    public function render($request, Throwable $exception)
{
    if ($exception instanceof PostTooLargeException) {
        Log::info('PostTooLargeException caught in Handler.');
        return redirect()->back()->with('validationErrors', 'The uploaded file is too large. Maximum file size allowed is 10MB.');
    }

    return parent::render($request, $exception);
}

}
