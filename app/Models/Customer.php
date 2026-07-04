<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'customer_name',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
