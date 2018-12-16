<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\OrderRequest;
use App\Models\UserAddress;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // 利用 Laravel 的自动解析功能注入 CartService 类
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    public function index(Request $request)
    {
        $orders = Order::query()
                        // 使用 with 方法预加载，避免N + 1问题
                       ->with(['items.product', 'items.productSku'])
                       ->where('user_id', $request->user()->id)
                       ->orderBy('created_at', 'desc')
                       ->paginate();

        return view('orders.index',compact('orders'));
    }

    public function show(Order $order,Request $request)
    {
        $this->authorize('own', $order);
        // load 延迟预加载 通常在返回一条 Order 使用
        return view('orders.show',['order' =>$order->load(['items.product','items.productSku'])]);
    }

    public function received(Order $order, Request $request)
    {
        // 校验权限
        $this->authorize('own',$order);

        // 判断订单的发货状态是否为已发货
        if ($order->ship_status !== Order::SHIP_STATUS_DELIVERED){
            throw new InvalidRequestException('发货状态不正确');
        }

        // 更新发货状态为已收到
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        if ($request->expectsJson()){
            // 返回订单信息
            return $order;
        }
        // 返回原页面
        return redirect()->back();


    }
}
