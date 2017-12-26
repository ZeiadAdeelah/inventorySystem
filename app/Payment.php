<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['amount', 'payment_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
