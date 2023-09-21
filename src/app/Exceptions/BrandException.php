<?php

namespace App\Exceptions;

use App\Common\StandardErrorCode;
use Exception;
use Illuminate\Support\Facades\Log;

class BrandException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        Log::debug('Brand not found');
    }

    public function render($request)
    {
        return response()->json([
            'success' => 0,
            'error_code' => StandardErrorCode::NOT_FOUND,
            'msg' => 'Brand not found.',
        ], 400);
    }
}
