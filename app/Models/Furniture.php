<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Furniture extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'furniture';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'furniture_name',
        'sku',
        'price',
        'stock_quantity',
        'status',
    ];

    protected $hidden = [ 
      'sku',  
    ];
    /**
     * Get the category that owns the furniture.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
