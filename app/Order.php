<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_date', 'order_due_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products')
            ->withPivot('quantity');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
