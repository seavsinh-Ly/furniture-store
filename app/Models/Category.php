<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    /**
     * Updated fillable array to include 'description'
     */
    protected $fillable = [
        'category_name',
        'description', // <-- Added this
    ];

    public function furniture(): HasMany
    {
        return $this->hasMany(Furniture::class);
    }
}