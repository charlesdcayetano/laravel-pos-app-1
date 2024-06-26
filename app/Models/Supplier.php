<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_name',
        'contact_name',
        'address',
        'city',
        'region',
        'postal_code',
        'country',
        'phone',
        'is_deleted'
    ];
}
