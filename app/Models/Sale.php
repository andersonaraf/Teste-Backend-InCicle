<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'type', 'card', 'total_price', 'buy_date'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function salesInformation(){
        return $this->hasMany(SalesInformation::class, 'sale_id', 'id');
    }
}
