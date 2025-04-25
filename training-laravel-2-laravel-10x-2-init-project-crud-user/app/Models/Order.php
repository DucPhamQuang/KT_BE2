<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
    ];

    // Mỗi đơn hàng thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mỗi đơn hàng có nhiều sản phẩm (giả sử bạn có bảng trung gian order_product)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }
}
