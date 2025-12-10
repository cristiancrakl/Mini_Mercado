<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServerErrorController
{
    /**
     * Render 500 error view
     */
    public static function render(Request $request, $exception = null)
    {
        return response()->view('errors.500', ['exception' => $exception], 500);
    }
}
