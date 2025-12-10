<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DatabaseErrorController
{
    /**
     * Render database error view
     */
    public static function render(Request $request, $exception = null)
    {
        return response()->view('errors.database', ['exception' => $exception], 500);
    }
}
