<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "user_id",
        "name",
        "tax_number",
        "tax_ratio"
    ];

    /**
     * Get the owner of the company.
     *
     * @return BelongsTo
     */
    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    /**
     * Get list of products that belongs to this company.
     *
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get list of suppliers that belongs to this company.
     *
     * @return HasMany
     */
    public function suppliers() : HasMany
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * Get list of orders that belongs to this company.
     *
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get list of orders that belongs to this company.
     *
     * @return HasMany
     */
    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
