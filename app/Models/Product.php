<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'price',
        'active',
        'quantity',
        'photograph'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }
}
