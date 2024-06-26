<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'quantity', 'image', 'brand', 'color', 'size', 'material', 'category_id', 'supplier_id', 'is_active', 'is_deleted'];
}
