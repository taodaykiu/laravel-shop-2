<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Carbon\Carbon;

class CouponCodesController extends Controller
{
    //
    public function show($code)
    {
        //abort() 方法可以直接中断我们程序的运行，接受的参数会变成 Http 状态码返回
        // 判断优惠券是否存在
        if (!$record = CouponCode::query()->where('code', $code)->first()) {
            abort(404);
        }

        $record->checkAvailable();

        return $code;
    }
}
