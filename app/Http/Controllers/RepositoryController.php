<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\OrderDetail;
use App\User;

class RepositoryController extends Controller
{

    protected $top = 10;

    public function topOrderProduct()
    {
        $items = Product::whereHas('orderDetail')
            ->withCount('orderDetail')
            ->with('productCategory')
            ->orderBy('order_detail_count', 'DESC')
            ->limit($this->top)
            ->get();
            
        $orders = OrderDetail::select('product_id', DB::raw('sum(qty) as sum_order'))
            ->with('product.productCategory')
            ->groupBy('product_id')
            ->orderBy('sum_order', 'DESC')
            ->limit($this->top)
            ->get();

        
        return view('top-order-product', compact(['items', 'orders']));
    }

    public function topOrderCustomer()
    {
        $items = User::whereHas('customerOrder')
            ->withCount('customerOrder')
            ->with('customer')
            ->orderBy('customer_order_count', 'DESC')
            ->limit($this->top)
            ->get();
            
        return view('top-order-customer', compact(['items']));
    }

    public function topOrderAgent()
    {
        $items = User::whereHas('agentOrder')
            ->withCount('agentOrder')
            ->with('agent')
            ->orderBy('agent_order_count', 'DESC')
            ->limit($this->top)
            ->get();
            
        return view('top-order-agent', compact(['items']));
    }
}
