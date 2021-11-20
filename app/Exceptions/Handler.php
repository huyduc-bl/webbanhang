<?php

namespace App\Exceptions;

/*
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
*/

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
       // dd($exception);

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $class = get_class($exception);
        switch($class) {
        case 'Illuminate\Auth\AuthenticationException':
            $guard = $exception->guards()[0];
            switch ($guard) {
                case 'admin':
                    return redirect()->guest('login/admin');
                    break;
                default:
                    return redirect()->guest(route('login'));
            }
        }
        return redirect()->guest(route('login'));

    }

    /**
     * A list of the exception types that are not reported.
     *
    / * @var string[]
     */
    //protected $dontReport = [
        //
    //];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
    / * @var string[]
     */
    //protected $dontFlash = [
    //    'current_password',
    //    'password',
    //    'password_confirmation',
    //];

    /**
     * Register the exception handling callbacks for the application.
     *
    / * @return void
     */
    //public function register()
    //{
    //    $this->reportable(function (Throwable $e) {
            //
    //    });
    //}
}
