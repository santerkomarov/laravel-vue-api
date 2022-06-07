<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
        //https://laravel.com/docs/9.x/errors
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status'=> 'failed',
                    'message' => 'Resource not found.'
                ], 200);
            }
        });
    }

    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }



    //? changing Unauthenticated message
    // {"message":"Unauthenticated."}

    //! answer 1
    // if ($request->expectsJson() && $exception instanceof AuthenticationException)
    //     return response()->json(["stat" => 'er' , 'msg' => 'Unauthenticated' ], 401);

    //! answer 2
    // $this->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
    //     if ($request->is('api/*')) {
    //         return response()->json([
    //             'message' => 'Not authenticated'
    //         ], 401);
    //     }
    // });

}
