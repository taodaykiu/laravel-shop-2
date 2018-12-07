<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class InternalException extends Exception
{
    /**
     * InternalException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    //展示给用户的异常处理
    public function render(Request $request)
    {
        if ($request->expectsJson()){
            return response()->json(['msg' => $this->msgForUser,$this->code]);
        }

        return view('pages.error',['msg' => $this->msgForUser]);
    }
}
