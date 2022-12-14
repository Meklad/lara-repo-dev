<?php

namespace App\Models;

use App\Models\Company;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "company_id",
        "code",
        "name",
        "description",
        "price",
        "image"
    ];

    /**
     * Get the company that own this product.
     *
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    /**
     * Get list of order items that belongs to this product
     *
     * @return HasMany
     */
    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class)->where("company_id", $this->company_id)->get();
    }
}
