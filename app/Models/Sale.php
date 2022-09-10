<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Note: whenever the forigen key is is custom i.e., doesn't have the name "tablename_id", we should manually write it as below with customer.
    // A sale can be made by a user.
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A sale can be made by a user.
    public function customer() {
        return $this->belongsTo(Customer::class, 'cust_id');
    }

    // A sale depends on a currency.
    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
