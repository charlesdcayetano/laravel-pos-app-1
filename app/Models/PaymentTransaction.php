<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;
    protected $table = 'payment_transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'total', 
        // 'customer_id', 
        // 'payment_method_id'
    ];
}
