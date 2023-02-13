<?php

namespace App\Exceptions;

use App\Traits\ApiResponseTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->reportable(function (Throwable $exception) {
            //
        });

        $this->renderable(function (Throwable $exception, $request) {
            $response = null;
            if ($exception instanceof HttpException) {
                $code = $exception->getStatusCode();
                $message = Response::$statusTexts[$code];
                $response = $this->errorResponse($message, $code);
            }
    
            if ($exception instanceof ModelNotFoundException) {
                $model = strtolower(class_basename($exception->getModel()));
                $response = $this->errorResponse("Does not exist any instance of {$model}", Response::HTTP_NOT_FOUND);
            }
    
            if ($exception instanceof AuthorizationException) {
                $response = $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
            }
    
            if ($exception instanceof AuthenticationException) {
                $response = $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
            }
    
            if ($exception instanceof ValidationException) {
                $errors = $exception->validator->errors()->getMessages();
                $response = $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
    
            if (is_null($response) && env('APP_DEBUG', false)) {
                dd($exception, $request);
            }

            if ($response) {
                return $response;
            }
    
            return $this->errorResponse('Unexpected error. Try again later.', Response::HTTP_INTERNAL_SERVER_ERROR);
        });

    }
}
