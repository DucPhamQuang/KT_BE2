<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      // Cột liên kết với bảng users
        'name',         // Tên sản phẩm
        'description',  // Mô tả sản phẩm
        'price',        // Giá sản phẩm
    ];

    /**
     * Một sản phẩm thuộc về một người dùng (quan hệ belongsTo)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Sử dụng 'user_id' làm khóa ngoại
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
