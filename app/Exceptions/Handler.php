<?php

namespace App\Exceptions;

use Throwable;



use App\Exceptions\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // Otros métodos del manejador de excepciones...

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return $exception->render($request);
        }

        return parent::render($request, $exception);
    }
}
