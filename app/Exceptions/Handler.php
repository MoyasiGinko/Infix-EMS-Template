<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->renderable(function (Throwable $throwable, $request) {
            if ($throwable instanceof ValidationException) {
                return null;
            }
            if ($throwable instanceof HttpExceptionInterface && $throwable->getStatusCode() != 500) {
                return null;
            }

            return response('<pre style="white-space:pre-wrap; background:#181818; color:#f85149; padding:20px; font-size:14px; font-family:monospace; line-height:1.5; border:1px solid #da3633; border-radius:6px; margin:20px;">' . 
                '<strong>[500 EXCEPTION]</strong> ' . htmlspecialchars(get_class($throwable)) . "\n" .
                '<strong>MESSAGE:</strong> ' . htmlspecialchars($throwable->getMessage()) . "\n" .
                '<strong>LOCATION:</strong> ' . htmlspecialchars($throwable->getFile()) . ':' . $throwable->getLine() . "\n\n" .
                '<strong>STACK TRACE:</strong>' . "\n" . htmlspecialchars($throwable->getTraceAsString()) .
            '</pre>', 500);
        });
    }

    /**
     * Report or log an exception.
     *
     * @param  Exception  $throwable
     */
    public function report(Throwable $throwable): void
    {
        parent::report($throwable);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Exception  $throwable
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $throwable)
    {
        if ($throwable instanceof \Illuminate\Session\TokenMismatchException) {
            return redirect('login');
        }

        if (config('app.debug') || env('APP_DEBUG', true) || request()->has('debug') || request()->is('admin-dashboard*') || request()->is('test-dash*')) {
            return response('<pre style="white-space:pre-wrap; background:#181818; color:#f85149; padding:20px; font-size:14px; font-family:monospace; line-height:1.5; border:1px solid #da3633; border-radius:6px; margin:20px;">' . 
                '<strong>[500 EXCEPTION]</strong> ' . htmlspecialchars(get_class($throwable)) . "\n" .
                '<strong>MESSAGE:</strong> ' . htmlspecialchars($throwable->getMessage()) . "\n" .
                '<strong>LOCATION:</strong> ' . htmlspecialchars($throwable->getFile()) . ':' . $throwable->getLine() . "\n\n" .
                '<strong>STACK TRACE:</strong>' . "\n" . htmlspecialchars($throwable->getTraceAsString()) .
            '</pre>', 500);
        }

        return parent::render($request, $throwable);
    }
}
