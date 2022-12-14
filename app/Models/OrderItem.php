<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "company_id",
        "order_id",
        "product_id",
        "quantity",
        "unit_price",
        "total_price"
    ];

    /**
     * Get the company that own this order item.
     *
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    /**
     * Get the order that own this order item.
     *
     * @return BelongsTo
     */
    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class, "order_id", "id");
    }

    /**
     * Get the product that own this order item.
     *
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
