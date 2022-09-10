<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    // Note: whenever the forigen key is is custom i.e., doesn't have the name "tablename_id", we should manually write it as below with customer.
    // A transfer can be made by a user.
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A purchase can depend on a currency.
    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    // A transfer can be made from a customer.
    public function fromCustomer() {
        return $this->belongsTo(Customer::class, 'from_cust_id');
    }

    // A transfer can be made to a customer.
    public function toCustomer() {
        return $this->belongsTo(Customer::class, 'to_cust_id');
    }
}
