<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Tạo đơn hàng cho tất cả người dùng
    public function createOrdersForAllUsers()
    {
        $users = User::all();

        foreach ($users as $user) {
            Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORDER-' . strtoupper(uniqid()),
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Tạo đơn hàng cho tất cả người dùng thành công.');
    }

    // Hiển thị các đơn hàng và sản phẩm cho người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->with('products')->get(); // Cần có quan hệ orders trong model User và products trong model Order

        return view('orders.show', compact('user', 'orders'));
    }

    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }
    public function assignProductsToAllOrders()
    {
        $products = \App\Models\Product::all(); // Lấy tất cả sản phẩm

        $orders = \App\Models\Order::all();

        foreach ($orders as $order) {
            // Lấy ngẫu nhiên từ 1 đến 3 sản phẩm
            $randomProducts = $products->random(rand(1, 3))->pluck('id')->toArray();

            // Gán sản phẩm cho đơn hàng
            $order->products()->syncWithoutDetaching($randomProducts);
        }

        return redirect()->route('orders.index')->with('success', 'Đã gán sản phẩm cho tất cả đơn hàng!');
    }
}
