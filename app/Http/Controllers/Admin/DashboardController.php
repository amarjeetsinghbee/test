<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = $this->stats();

        return view('admin.dashboard', compact('stats'));
    }

    public function summary(): JsonResponse
    {
        return response()->json($this->stats());
    }

    private function stats(): array
    {
        return [
            'categories' => Category::count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'revenue' => (float) Order::where('status', 'completed')->sum('total_amount'),
            'pending_orders' => Order::where('status', 'pending')->count(),
        ];
    }
}
