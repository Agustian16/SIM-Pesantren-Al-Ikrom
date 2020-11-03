<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        parent::report($exception);

        // if ($exception instanceof HttpExceptionInterface) {
        //     if ($exception->getStatusCode() === 408) {
        //         Log::error($exception->getMessage());

        //         return redirect('/login')->with('message', 'Waktu koneksi habis, silahkan coba lagi.');
        //     }

        //     if ($exception->getStatusCode() === 404) {
        //         return response()->view('error.404', [], 404);
        //     }

        //     if ($exception->getStatusCode() >= 500) {
        //         return response()->view('error.505', [], $exception->getStatusCode());
        //     }
        // }

        // if ($exception instanceof TokenMismatchException) {
        //     return redirect()
        //             ->back()
        //             ->with('message', 'Anda sudah terlalu lama diam di halaman ini, silahkan coba lagi.');
        // }

        return parent::render($request, $exception);
    }
}
