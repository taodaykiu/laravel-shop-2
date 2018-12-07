<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;

class InvalidRequestException extends Exception
{
    /**
     * InvalidRequestException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    //该异常被触发时系统会调用 render() 方法来输出
    public function render(Request $request)
    {
        if ($request->expectsJson()){
            // json() 方法第二个参数就是 Http 返回码
            return response()->json(['msg' => $this->message],$this->code);
        }
        return view('pages.error',['msg' => $this->message]);
    }
}
