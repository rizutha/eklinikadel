<?php

namespace App\Exceptions;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response(view('errors.404'), Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }

    public function query($request, Throwable $exception)
    {
        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1451) {
                return response()->view('errors.500', [], 500);
            }
        }
        
         if ($exception instanceof ModelNotFoundException) {
            return response(view('errors.404'), Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
    
}
