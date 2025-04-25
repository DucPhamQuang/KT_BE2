<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;

class Controller extends BaseController
{
    public function store(Request $request)
    {
        // Kiểm tra và tạo sản phẩm mới
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = $request->user_id; // Liên kết với người dùng có ID = user_id
        $product->save();

        // Trả về hoặc chuyển hướng sau khi lưu
        return redirect()->route('products.index');
    }
}
