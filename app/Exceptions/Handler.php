<?php

namespace App\Exceptions;

use Throwable;

use App\Exceptions\NotFoundHttpException;
use App\Exceptions\NotFoundController;
use App\Exceptions\DatabaseErrorController;
use App\Exceptions\ServerErrorController;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as SymfonyNotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    // Otros métodos del manejador de excepciones...

    public function render($request, Throwable $exception)
    {
        // Custom app NotFoundHttpException (your class)
        if ($exception instanceof NotFoundHttpException) {
            return $exception->render($request);
        }

        // Symfony 404 exception -> render 404 view via controller
        if ($exception instanceof SymfonyNotFoundHttpException) {
            return NotFoundController::render($request, $exception);
        }

        // Database errors
        if ($exception instanceof QueryException) {
            return DatabaseErrorController::render($request, $exception);
        }

        // Generic HTTP exceptions (handle 500)
        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
            if ($status >= 500) {
                return ServerErrorController::render($request, $exception);
            }
        }

        return parent::render($request, $exception);
    }
}