<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'note',
        'status',
    ];
    public function bill()
    {
        return $this->hasMany(Bill::class, 'customer_id', 'id');
    }
}
