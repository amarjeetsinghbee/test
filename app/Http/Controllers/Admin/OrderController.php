<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderStatusRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $orders = Order::withCount('items')->latest()->paginate(15);

        if ($request->expectsJson()) {
            return response()->json($orders);
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order): View|JsonResponse
    {
        $order->load('items.product');

        if ($request->expectsJson()) {
            return response()->json($order);
        }

        return view('admin.orders.show', compact('order'));
    }

    public function update(OrderStatusRequest $request, Order $order): RedirectResponse|JsonResponse
    {
        $order->update($request->validated());

        if ($request->expectsJson()) {
            return response()->json($order);
        }

        return back()->with('success', 'Order status updated.');
    }

    public function destroy(Request $request, Order $order): RedirectResponse|JsonResponse
    {
        $order->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return back()->with('success', 'Order deleted.');
    }
}
