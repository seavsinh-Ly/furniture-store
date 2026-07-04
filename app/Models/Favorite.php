<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'customer_id',
        'furniture_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function furniture()
    {
        return $this->belongsTo(Furniture::class);
    }
}
