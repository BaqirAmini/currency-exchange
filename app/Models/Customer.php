<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = "cust_id";
    protected $table = "customers";

    // A customer can make many purchases.
    public function purchase() {
        return $this->hasMany(Purchase::class, 'cust_id');
    }

    // A customer can make many sales.
    public function sale() {
        return $this->hasMany(Sale::class, 'cust_id');
    }

    // Many transfers can be done from a customer.
    public function transferFrom() {
        return $this->hasMany(Transfer::class, 'from_cust_id');
    }

    // Many transfers can be done to a customer.
    public function transferTo() {
        return $this->hasMany(Transfer::class, 'to_cust_id');
    }

}
