<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::with(['userCustomer']);
        if($request->search) {
            $order = $order->where('invoice_id', 'like', '%'.$request->search.'%')
                    ->orWhere('name', 'like', '%'.$request->search.'%')
                    ->orWhere('agent_name', 'like', '%'.$request->search.'%')
                    ->orWhere('agent_name', 'like', '%'.$request->search.'%')
                    ->orWhere('payment_final', 'like', '%'.$request->search.'%');
        }
        
        $items = $order->paginate(10);

        return view('order.index', compact(['items']));
    }

    public function show(Request $request, $id)
    {
        $item = Order::with('orderDetail.product')->find($id);
        return view('order.show', compact(['item']));
    }
}
