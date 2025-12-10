<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundController
{
    /**
     * Render 404 view
     */
    public static function render(Request $request, $exception = null)
    {
        return response()->view('errors.404', [], 404);
    }
}
