<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // Note: whenever the forigen key is is custom i.e., doesn't have the name "tablename_id", we should manually write it as below with customer.
    // A purchase can be made by a user.
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A purchase can be made by a customer.
    public function customer() {
        return $this->belongsTo(Customer::class, 'cust_id');
    }

    // A purchase depends on a currency.
    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
