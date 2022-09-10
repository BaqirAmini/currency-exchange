<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $primaryKey = "currency_id";
    protected $table = "currencies";
    // A currency can be purchased many times.
    public function purchase() {
        return $this->hasMany(Purchase::class, 'currency_id');
    }

    // A currency can be sold many times
    public function sale() {
        return $this->hasMany(Sale::class, 'currency_id');
    }

    // A currency can have many transfers.
    public function transfer() {
        return $this->hasMany(Transfer::class, 'currency_id');
    }

}
