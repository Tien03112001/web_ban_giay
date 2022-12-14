<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'active',
    ];
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function Product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
