<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'skill', 'address', 'customer_id'];

    // An artisan belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

